<?php


namespace App\Client;


class OrganisationClient extends DbClient
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getOrganisations()
    {
         return json_decode(
             json_encode($this->decoder->decode($this->get('Organizations')->getBody()))
         , true);
    }
}
