<?php


namespace App\Http\Livewire\User;


use App\Client\UserClient;
use Exception;

class Create extends UserComponent
{
    public $user = [
        'userRoleId' => 1,
        'email',
        'firstName',
        'lastName',
        'password',
        'userName',
    ];

    public function save()
    {
        $this->validate();

        try {
            if (app(UserClient::class)->createUser($this->user)) {
                $this->dispatchBrowserEvent('successMessage', ['message' => 'Successfully created user']);
                return redirect()->route('admin.users.index');
            }
        } catch (Exception $exception) {
            $this->dispatchBrowserEvent('errorMessage', ['message' => 'Failed to create user']);
        }

        return back();
    }

    public function render()
    {
        return view('livewire.user.create')->extends('backend.layout.app')->section('content');
    }
}
