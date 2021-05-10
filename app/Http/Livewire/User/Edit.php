<?php

namespace App\Http\Livewire\User;

use App\Client\UserClient;
use Livewire\Component;

class Edit extends Component
{
    public $user;

    public function rules()
    {
        return [
            'user.firstName' => 'required'
        ];
    }

    public function mount()
    {
        $this->user = app(UserClient::class)->getUser(1);
    }

    public function save()
    {
        $this->validate();

        $result = app(UserClient::class)->updateUser($this->user);
    }

    public function render()
    {
        return view('livewire.user.edit')->extends('backend.layout.app')->section('content');
    }
}
