<?php


namespace App\Client;

class AuthClient extends DbClient
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register(array $data)
    {
        $data['userRoleId'] = 1;

        $response = $this->post('Users',[
            'json' => $data
        ]);

        return $this->decoder->decode($response->getBody());
    }

    public function login(array $data)
    {
        $response = $this->post('Authentication/login', [
            'json' => $data
        ]);

        return $this->decoder->decode($response->getBody());
    }

    public function verifyUser(array $data)
    {
        return $this->get("Verification/{$data['id']}/verify/{$data['code']}");
    }
}
