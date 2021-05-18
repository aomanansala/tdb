<?php

namespace App\Http\Livewire\Organisation;

use App\Client\OrganisationClient;
use App\Client\QX7\MasterColorClient;
use Livewire\Component;

class Index extends Component
{
    public $organisations;
    public $pages;

    protected $masterColors;

    public function mount()
    {
        $result = app(OrganisationClient::class)->getOrganisations();
        $this->masterColors = collect(app(MasterColorClient::class)->getMasterColors());

        $this->organisations = collect($result['organization'])->each(function($organisation) {
            $organisation['toggle'] = false;

            collect($organisation['colorSets'])->map(function(&$colorSet) {
                $color = $this->masterColors->filter(function($color) use (&$colorSet) {
                    return $color->id == $colorSet['qx7ColorId'];
                })->first();

                $colorSet['hexCode'] = optional($color)->hex_code;

                return $colorSet;
            });

            return $organisation;
        })->all();

        dd($this->organisations);


        $this->pages = $result['pages'];
    }

    public function render()
    {
        return view('livewire.organisation.index')->extends('backend.layout.app')->section('content');
    }

    public function toggle($id)
    {
        $this->organisations = collect($this->organisations)->map(function(&$organisation) use ($id) {
            if ($organisation['id'] == $id) {
                $organisation['toggle'] = ! $organisation['toggle'];
            }

            return $organisation;
        });
    }
}
