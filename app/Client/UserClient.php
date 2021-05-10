<?php


namespace App\Client;


class UserClient extends DbClient
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsers()
    {
        return $this->decoder->decode($this->get('Users')->getBody());
    }

    public function getUser($id)
    {
        return (array) $this->decoder->decode(
            $this->get("Users/{$id}")->getBody()
        );
    }

    public function updateUser($data)
    {
        return $this->decoder->decode(
            $this->post('Users', [
                'json' => $data
            ])->getBody()
        );
    }

    public function createUser($data)
    {
        return $this->decoder->decode(
            $this->post('Users', [
                'json' => $data
            ])->getBody()
        );
    }
}
