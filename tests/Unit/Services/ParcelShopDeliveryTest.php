<?php

namespace Webapix\GLS\Tests\Unit\Services;

use Webapix\GLS\Services\ParcelShopDelivery;
use Webapix\GLS\Tests\TestCase;

class ParcelShopDeliveryTest extends TestCase
{
    /** @test */
    public function it_can_set_the_params()
    {
        $service = new ParcelShopDelivery(12345);

        $this->assertEquals([
            'Code' => 'PSD',
            'PSDParameter' => [
                'StringValue' => 12345,
            ],
        ], $service->toArray());
    }
}
