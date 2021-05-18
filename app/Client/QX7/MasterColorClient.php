<?php


namespace App\Client\QX7;


class MasterColorClient extends QX7Client
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getMasterColors()
    {
        return $this->decoder->decode(
            $this->get('master_colors')->getBody()
        )->master_colors;
    }
}
