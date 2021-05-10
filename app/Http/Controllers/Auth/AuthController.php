<?php

namespace App\Http\Controllers\Auth;

use App\Client\AuthClient;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Log;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    protected $userClient;

    public function __construct(AuthClient $userClient)
    {
        $this->userClient = $userClient;
    }

    public function signUpIndex()
    {
        return view('frontend.pages.sign-up');
    }

    public function signUpStore(Request $request)
    {
        try {
            $this->userClient->register($request->all());
        } catch (Exception $exception) {
            logger()->info($exception->getMessage());
            return view('frontend.pages.sign-up')->withErrors(['Please try again']);
        }
        session()->flash('success', 'Please check your email to verify your registration.');
        return view('frontend.pages.sign-up');
    }

    public function loginIndex(Request $request)
    {
        return view('frontend.pages.login');
    }

    public function loginStore(Request $request)
    {
        try {
            $result = $this->userClient->login($request->all());

            if ($result) {
                if (isset($result->userDetails->password)) {
                    unset($result->userDetails->password);
                }

                $request->session()->put('token', $result->token);
                $request->session()->put('user', (array) $result->userDetails);

                return redirect(route('admin.users.index'));
            }
        } catch (Exception $exception) {
            logger()->info($exception->getMessage());
            return redirect(route('auth.login.index'))->withErrors(['Please try again']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect(route('frontend.index'));
    }

    public function verifyEmail(Request $request)
    {
        try {
            $response = $this->userClient->verifyUser($request->all());

            if ($response->getStatusCode() == Response::HTTP_OK) {
                session()->flash('success', 'Your email is now verified.');

                return redirect()->route('auth.login.index');
            }
        } catch (Exception $exception) {
            logger()->info($exception->getMessage());
        }

        return redirect()->route('auth.sign-up.index');
    }
}
