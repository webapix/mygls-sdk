<?php

namespace Webapix\GLS\Tests\Unit\Requests;

use Webapix\GLS\Requests\ModifyCod;
use Webapix\GLS\Tests\TestCase;

class ModifyCODTest extends TestCase
{
    /** @test */
    public function it_can_set_params()
    {
        $request = new ModifyCod(1, 2, 10);

        $this->assertEquals([
            'ParcelId' => 1,
            'ParcelNumber' => 2,
            'CODAmount' => 10,
        ], $request->toArray());
    }

    /** @test */
    public function it_can_return_a_reponse()
    {
        $request = new ModifyCod(1, 2, 10);

        $this->assertInstanceOf(\Webapix\GLS\Responses\ModifyCod::class, $request->makeResponse([]));
    }
}
