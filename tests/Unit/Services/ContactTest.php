<?php

namespace Webapix\GLS\Tests\Unit\Services;

use Webapix\GLS\Services\Contact;
use Webapix\GLS\Tests\TestCase;

class ContactTest extends TestCase
{
    /** @test */
    public function it_can_set_the_params()
    {
        $service = new Contact($phone = '+3630123456789');

        $this->assertEquals([
            'Code' => 'CS1',
            'CS1Parameter' => [
                'Value' => $phone,
            ],
        ], $service->toArray());
    }
}
