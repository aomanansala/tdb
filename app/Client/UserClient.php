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
        return json_decode(
            json_encode($this->decoder->decode($this->get('Users')->getBody()))
        , true);
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
            $this->put('Users', [
                'json' => $data
            ])->getStatusCode()
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

    public function deleteUser($id)
    {
        return $this->decoder->decode($this->delete("Users/{$id}")->getStatusCode());
    }
}
