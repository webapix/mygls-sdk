<?php

namespace Webapix\GLS\Tests\Unit\Requests;

use Webapix\GLS\Requests\PrepareLabels;
use Webapix\GLS\Tests\Factories\ParcelFactory;
use Webapix\GLS\Tests\TestCase;

class PrepareLabelsTest extends TestCase
{
    /** @test */
    public function it_can_set_parcels()
    {
        $request = new PrepareLabels;

        $request->addParcel($parcel1 = ParcelFactory::new()->model());
        $this->assertEquals(['ParcelList' => [$parcel1->toArray()]], $request->toArray());

        $request->addParcel($parcel2 = ParcelFactory::new()->model());
        $this->assertEquals(['ParcelList' => [$parcel1->toArray(), $parcel2->toArray()]], $request->toArray());
    }

    /** @test */
    public function it_can_return_a_response()
    {
        $request = new PrepareLabels;

        $this->assertInstanceOf(\Webapix\GLS\Responses\PrepareLabels::class, $request->makeResponse([]));
    }
}
