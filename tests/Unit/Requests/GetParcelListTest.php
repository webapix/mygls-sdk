<?php

namespace Webapix\GLS\Tests\Unit\Requests;

use Webapix\DotNetJsonDate\Date;
use Webapix\GLS\Requests\GetParcelList;
use Webapix\GLS\Tests\TestCase;

class GetParcelListTest extends TestCase
{
    /** @test */
    public function it_can_set_the_pickup_dates()
    {
        $request = new GetParcelList;

        $request->addPickupDateInterval(
            $from = \DateTime::createFromFormat('Y-m-d', '2020-08-01'),
            $to = \DateTime::createFromFormat('Y-m-d', '2020-08-02')
        );

        $this->assertEquals([
            'PickupDateFrom' => Date::toJsonDate($from),
            'PickupDateTo' => Date::toJsonDate($to),
            'PrintDateFrom' => null,
            'PrintDateTo' => null,
        ], $request->toArray());
    }

    /** @test */
    public function it_can_set_the_print_dates()
    {
        $request = new GetParcelList;

        $request->addPrintDateInterval(
            $from = \DateTime::createFromFormat('Y-m-d', '2020-08-01'),
            $to = \DateTime::createFromFormat('Y-m-d', '2020-08-02')
        );

        $this->assertEquals([
            'PickupDateFrom' => null,
            'PickupDateTo' => null,
            'PrintDateFrom' => Date::toJsonDate($from),
            'PrintDateTo' => Date::toJsonDate($to),
        ], $request->toArray());
    }

    /** @test */
    public function it_can_return_a_response()
    {
        $request = new GetParcelList;

        $this->assertInstanceOf(\Webapix\GLS\Responses\GetParcelList::class, $request->makeResponse([]));
    }
}
