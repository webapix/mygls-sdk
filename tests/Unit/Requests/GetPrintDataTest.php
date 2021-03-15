<?php

namespace Webapix\GLS\Tests\Unit\Requests;

use Webapix\GLS\Requests\GetPrintData;
use Webapix\GLS\Tests\Factories\ParcelFactory;
use Webapix\GLS\Tests\TestCase;

class GetPrintDataTest extends TestCase
{
    /** @test */
    public function it_can_set_parcels()
    {
        $request = new GetPrintData;

        $request->addParcel($parcel1 = ParcelFactory::new()->model());
        $this->assertEquals(
            [
                'ParcelList' => [$parcel1->toArray()],
                'ParcelIdList' => [],
            ],
            $request->toArray()
        );

        $request->addParcel($parcel2 = ParcelFactory::new()->model());
        $this->assertEquals(
            [
                'ParcelList' => [$parcel1->toArray(), $parcel2->toArray()],
                'ParcelIdList' => [],
            ],
            $request->toArray()
        );
    }

    /** @test */
    public function it_can_set_parcel_ids()
    {
        $request = new GetPrintData;

        $request->addParcelId(1);
        $this->assertEquals(
            [
                'ParcelList' => [],
                'ParcelIdList' => [1],
            ],
            $request->toArray()
        );

        $request->addParcelId(2);
        $this->assertEquals(
            [
                'ParcelList' => [],
                'ParcelIdList' => [1, 2],
            ],
            $request->toArray()
        );
    }

    /** @test */
    public function it_can_return_a_response()
    {
        $request = new GetPrintData;

        $this->assertInstanceOf(\Webapix\GLS\Responses\GetPrintData::class, $request->makeResponse([]));
    }
}
