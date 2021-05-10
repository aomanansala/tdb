<?php


namespace App\Http\Livewire\User;


use App\Client\UserClient;
use Exception;
use Livewire\Component;

class Create extends Component
{
    public $user = [
        'userRoleId' => 1,
        'email',
        'firstName',
        'lastName',
        'password',
        'userName',
    ];

    public function rules()
    {
        return [
            'user.email' => 'required|email',
            'user.firstName' => 'required',
            'user.lastName' => 'required',
            'user.password' => 'required',
            'user.userName' => 'required',
        ];
    }

    public function save()
    {
        $this->validate();

        try {
            if (app(UserClient::class)->createUser($this->user)) {
                session()->flash('successMessage', 'Successfully created user');

                return redirect()->route('admin.users.index');
            }
        } catch (Exception $exception) {
            session()->flash('errorMessage', 'Failed to create user');
        }

        return back();
    }

    public function render()
    {
        return view('livewire.user.create')->extends('backend.layout.app')->section('content');
    }
}
