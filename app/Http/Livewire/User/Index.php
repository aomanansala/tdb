<?php

namespace App\Http\Livewire\User;

use App\Client\UserClient;
use Livewire\Component;

class Index extends Component
{
    public $users;

    public function mount()
    {
        $this->users = app(UserClient::class)->getUsers();
    }

    public function render()
    {
        return view('livewire.user.index')->extends('backend.layout.app')->section('content');
    }
}
