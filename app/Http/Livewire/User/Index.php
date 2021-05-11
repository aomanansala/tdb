<?php

namespace App\Http\Livewire\User;

use App\Client\UserClient;
use Exception;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

class Index extends Component
{
    public $users;
    public $delete = false;
    public $userId;

    public function render()
    {
        $this->users = app(UserClient::class)->getUsers();

        return view('livewire.user.index')->extends('backend.layout.app')->section('content');
    }

    public function delete($id)
    {
        $this->delete = true;
        $this->userId = $id;
    }

    public function confirmDelete()
    {
        if (! $this->delete) {
            return;
        }

        try {
            if (app(UserClient::class)->deleteUser($this->userId) == Response::HTTP_OK) {
                $this->dispatchBrowserEvent('successMessage', ['message' => 'Successfully deleted user']);
            }
        } catch (Exception $exception) {
            $this->dispatchBrowserEvent('errorMessage', ['message' => 'Failed to delete user']);
            logger()->info($exception->getMessage());
        }



        $this->reset(['userId', 'delete']);
    }

    public function cancelDelete()
    {
        $this->delete = false;
        $this->userId = null;
    }
}
