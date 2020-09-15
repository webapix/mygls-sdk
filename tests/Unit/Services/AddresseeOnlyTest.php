<?php

namespace Webapix\GLS\Tests\Unit\Services;

use Webapix\GLS\Services\AddresseeOnly;
use Webapix\GLS\Tests\TestCase;

class AddresseeOnlyTest extends TestCase
{
    /** @test */
    public function it_can_set_the_params()
    {
        $service = new AddresseeOnly('John Doe');

        $this->assertEquals([
            'Code' => 'AOS',
            'AOSParameter' => [
                'Value' => 'John Doe',
            ],
        ], $service->toArray());
    }
}
