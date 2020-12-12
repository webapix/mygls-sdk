<?php

namespace Webapix\GLS\Tests\Unit\Requests;

use Webapix\GLS\Requests\GetParcelStatuses;
use Webapix\GLS\Tests\TestCase;

class GetParcelStatusesTest extends TestCase
{
    /** @test */
    public function it_can_set_params()
    {
        $request = new GetParcelStatuses(1234567, false, 'HU');

        $this->assertEquals([
            'ParcelNumber' => 1234567,
            'ReturnPOD' => false,
            'LanguageIsoCode' => 'HU',
        ], $request->toArray());
    }

    /** @test */
    public function language_iso_code_has_a_default_value()
    {
        $request = new GetParcelStatuses(1234567);

        $this->assertEquals('EN', $request->toArray()['LanguageIsoCode']);
    }

    /** @test */
    public function return_pod_has_a_default_value()
    {
        $request = new GetParcelStatuses(1234567);

        $this->assertFalse($request->toArray()['ReturnPOD']);
    }

    /** @test */
    public function it_can_set_the_language_iso_code()
    {
        $request = new GetParcelStatuses(1234567);
        $request->setLanguageIsoCode('HU');

        $this->assertEquals('HU', $request->toArray()['LanguageIsoCode']);
    }

    /** @test */
    public function it_can_return_a_response()
    {
        $request = new GetParcelStatuses(1234567);

        $this->assertInstanceOf(\Webapix\GLS\Responses\GetParcelStatuses::class, $request->makeResponse([]));
    }
}
