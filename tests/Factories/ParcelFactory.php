<?php

namespace Webapix\GLS\Tests\Factories;

use Webapix\GLS\Models\Parcel;

class ParcelFactory extends Factory
{
    public static function new()
    {
        return new self();
    }

    public function create(array $extra = [])
    {
        return array_merge(
            [
                'CODAmount' => 13240,
                'CODCurrency' => null,
                'CODReference' => null,
                'ClientNumber' => 100000,
                'ClientReference' => 'example-1',
                'Content' => 'test comment',
                'Count' => 1,
                'DeliveryAddress' => [
                    'City' => 'Sülysáp',
                    'ContactEmail' => 'test@example.com',
                    'ContactName' => 'Test Test',
                    'ContactPhone' => '+3630123456789',
                    'CountryIsoCode' => 'HU',
                    'HouseNumber' => '1',
                    'HouseNumberInfo' => null,
                    'Name' => 'Delivery Address Name',
                    'Street' => 'Delivery Address Street',
                    'ZipCode' => 'Delivery Address ZipCode',
                ],
                'PickupAddress' => [
                    'City' => 'Budapest',
                    'ContactEmail' => 'test@example.com',
                    'ContactName' => 'Test Contact Name',
                    'ContactPhone' => '+3620123456789',
                    'CountryIsoCode' => 'HU',
                    'HouseNumber' => '6',
                    'HouseNumberInfo' => null,
                    'Name' => 'Test name',
                    'Street' => 'street',
                    'ZipCode' => '12345',
                ],
                'PickupDate' => '/Date(1594764000000+0200)/',
            ],
            $extra
        );
    }

    public function model(array $extra = [])
    {
        return Parcel::fromArray($this->create($extra));
    }
}
