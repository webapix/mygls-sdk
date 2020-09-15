<?php

namespace Webapix\GLS\Tests\Unit\Requests;

use Webapix\GLS\Requests\DeleteLabels;
use Webapix\GLS\Tests\TestCase;

class DeleteLabelsTest extends TestCase
{
    /** @test */
    public function it_can_set_parcel_ids()
    {
        $request = new DeleteLabels;

        $request->addParcelId(1);
        $this->assertEquals(['ParcelIdList' => [1]], $request->toArray());

        $request->addParcelId(2);
        $this->assertEquals(['ParcelIdList' => [1, 2]], $request->toArray());
    }

    /** @test */
    public function it_can_return_a_response()
    {
        $request = new DeleteLabels;

        $this->assertInstanceOf(\Webapix\GLS\Responses\DeleteLabels::class, $request->makeResponse([]));
    }
}
