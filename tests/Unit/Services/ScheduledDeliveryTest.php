<?php

namespace Webapix\GLS\Tests\Unit\Services;

use Webapix\DotNetJsonDate\Date;
use Webapix\GLS\Services\ScheduledDelivery;
use Webapix\GLS\Tests\TestCase;

class ScheduledDeliveryTest extends TestCase
{
    /** @test */
    public function it_can_set_the_params()
    {
        $timeFrom = \DateTime::createFromFormat('Y-m-d H:i:s', '2020-08-01 10:00:00');
        $timeTo = \DateTime::createFromFormat('Y-m-d H:i:s', '2020-08-01 12:00:00');

        $service = new ScheduledDelivery($timeFrom, $timeTo);

        $this->assertEquals([
            'Code' => 'SDS',
            'SDSParameter' => [
                'TimeFrom' => Date::toJsonDate($timeFrom),
                'TimeTo' => Date::toJsonDate($timeTo),
            ],
        ], $service->toArray());
    }
}
