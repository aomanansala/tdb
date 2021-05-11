<?php

namespace App\Http\Livewire\User;

use App\Client\UserClient;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class Edit extends UserComponent
{
    public $user;

    public function mount($id)
    {
        $this->user = app(UserClient::class)->getUser($id);
    }

    public function save()
    {
        $this->validate();

        try {
            if (app(UserClient::class)->updateUser($this->user) == Response::HTTP_OK) {

                session()->flash('successMessage', 'Successfully updated user');
                return redirect()->route('admin.users.index');
            }
        } catch (Exception $exception) {
            $this->dispatchBrowserEvent('errorMessage', ['message' => 'Failed to update user']);
            logger()->info($exception->getMessage());
        }

        return back();
    }

    public function render()
    {
        return view('livewire.user.edit')->extends('backend.layout.app')->section('content');
    }
}
