<?php

namespace Webapix\GLS\Tests\Unit\Services;

use Webapix\GLS\Services\DeclaredParcelValue;
use Webapix\GLS\Tests\TestCase;

class DeclaredParcelValueTest extends TestCase
{
    /** @test */
    public function it_can_set_the_params()
    {
        $service = new DeclaredParcelValue('APITEST', 12500);

        $this->assertEquals([
            'Code' => 'DPV',
            'DPVParameter' => [
                'StringValue' => 'APITEST',
                'DecimalValue' => 12500
            ],
        ], $service->toArray());
    }
}
