<?php

namespace Webapix\GLS\Tests\Factories;

use Webapix\GLS\Models\PrintDataInfo;

class PrintDataInfoFactory extends Factory
{
    public static function new()
    {
        return new self();
    }

    public function create(array $extra = [])
    {
        return array_merge(
            [
                'B2CChar' => 'C',
                'ClientReference' => null,
                'Depot' => '30',
                'DepotNumber' => '30E2C',
                'Driver' => '30',
                'Parcel' => ParcelFactory::new()->create(),
                'ParcelId' => 54622309,
                'ParcelNumber' => 3117700796,
                'ParcelNumberWithCheckdigit' => 31177007966,
                'Sort' => 'E2',
            ],
            $extra
        );
    }

    public function model(array $extra = [])
    {
        return PrintDataInfo::fromArray($this->create($extra));
    }
}
