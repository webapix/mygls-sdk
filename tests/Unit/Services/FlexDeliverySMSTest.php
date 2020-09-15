<?php

namespace Webapix\GLS\Tests\Unit\Services;

use Webapix\GLS\Services\FlexDeliverySMS;
use Webapix\GLS\Tests\TestCase;

class FlexDeliverySMSTest extends TestCase
{
    /** @test */
    public function it_can_set_the_params()
    {
        $service = new FlexDeliverySMS($phone = '+3630123456789');

        $this->assertEquals([
            'Code' => 'FSS',
            'FSSParameter' => [
                'Value' => $phone,
            ],
        ], $service->toArray());
    }
}
