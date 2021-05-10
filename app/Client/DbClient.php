<?php


namespace App\Client;


use GuzzleHttp\Client;
use Webmozart\Json\JsonDecoder;

class DbClient extends Client
{
    protected $decoder;

    public function __construct()
    {
        $settings = [
            'base_uri' => env('TDB_HOST') . "/api/"
        ];

        if (session()->has('token')) {
            $settings['headers'] = [
                'Authorization' => 'Bearer ' . session()->get('token'),
            ];
        }

        parent::__construct($settings);
        $this->decoder = new JsonDecoder();
    }
}
