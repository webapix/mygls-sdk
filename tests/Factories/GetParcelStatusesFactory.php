<?php

namespace Webapix\GLS\Tests\Factories;

class GetParcelStatusesFactory extends Factory
{
    public static function new()
    {
        return new static();
    }

    public function create(array $extra = [])
    {
        return array_merge(
            [
                'ClientReference' => 'client-reference',
                'DeliveryCountryCode' => 'HU',
                'DeliveryZipCode' => 1013,
                'GetParcelStatusErrors' => [],
                'ParcelNumber' => 123456789,
                'ParcelStatusList' => [
                    ParcelStatusFactory::new()->create(),
                ],
                'POD' => null,
                'Weight' => 0.12,
            ],
            $extra
        );
    }
}
