<?php

namespace Webapix\GLS\Tests\Unit\Services;

use Webapix\DotNetJsonDate\Date;
use Webapix\GLS\Services\DayDefinite;
use Webapix\GLS\Tests\TestCase;

class DayDefiniteTest extends TestCase
{
    /** @test */
    public function it_can_set_the_params()
    {
        $service = new DayDefinite($date = \DateTime::createFromFormat('Y-m-d', '2020-08-01'));

        $this->assertEquals([
            'Code' => 'DDS',
            'DDSParameter' => [
                'Value' => Date::toJsonDate($date),
            ],
        ], $service->toArray());
    }
}
