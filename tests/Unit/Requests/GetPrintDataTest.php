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
        $this->assertEquals(['ParcelList' => [$parcel1->toArray()]], $request->toArray());

        $request->addParcel($parcel2 = ParcelFactory::new()->model());
        $this->assertEquals(['ParcelList' => [$parcel1->toArray(), $parcel2->toArray()]], $request->toArray());
    }

    /** @test */
    public function it_can_return_a_reponse()
    {
        $request = new GetPrintData;

        $this->assertInstanceOf(\Webapix\GLS\Responses\GetPrintData::class, $request->makeResponse([]));
    }
}
