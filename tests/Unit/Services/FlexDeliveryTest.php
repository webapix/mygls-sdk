<?php

namespace Webapix\GLS\Tests\Unit\Services;

use Webapix\GLS\Services\FlexDelivery;
use Webapix\GLS\Tests\TestCase;

class FlexDeliveryTest extends TestCase
{
    /** @test */
    public function it_can_set_the_params()
    {
        $service = new FlexDelivery($email = 'example@webapix.hu');

        $this->assertEquals([
            'Code' => 'FDS',
            'FDSParameter' => [
                'Value' => $email,
            ],
        ], $service->toArray());
    }
}
