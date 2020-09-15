<?php

namespace Webapix\GLS\Tests\Factories;

use Webapix\GLS\Models\ParcelStatus;

class ParcelStatusFactory extends Factory
{
    public static function new()
    {
        return new self();
    }

    public function create(array $extra = [])
    {
        return array_merge(
            [
                'DepotCity' => 'test city',
                'DepotNumber' => 12345,
                'StatusCode' => 'st5',
                'StatusDate' => '2020-08-01',
                'StatusDescription' => 'description',
                'StatusInfo' => 'info',
            ],
            $extra
        );
    }

    public function model(array $extra = [])
    {
        return ParcelStatus::fromArray($this->create($extra));
    }
}
