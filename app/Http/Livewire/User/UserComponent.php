<?php


namespace App\Http\Livewire\User;

use Livewire\Component;

class UserComponent extends Component
{
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
}
