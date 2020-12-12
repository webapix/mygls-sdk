<?php

namespace Webapix\GLS\Tests\Unit\Services;

use Webapix\GLS\Services\Insurance;
use Webapix\GLS\Tests\TestCase;

class InsuranceTest extends TestCase
{
    /** @test */
    public function it_can_set_the_params()
    {
        $service = new Insurance($value = 50000.00);

        $this->assertEquals([
            'Code' => 'INS',
            'INSParameter' => [
                'Value' => $value,
            ],
        ], $service->toArray());
    }
}
