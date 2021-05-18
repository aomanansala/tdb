<?php


namespace App\Client\QX7;

use GuzzleHttp\Client;
use Webmozart\Json\JsonDecoder;

class QX7Client extends Client
{
    protected $decoder;

    public function __construct()
    {
        $settings = [
            'base_uri' => env('QX7_HOST') . "/api/"
        ];

        parent::__construct($settings);
        $this->decoder = new JsonDecoder();
    }
}
