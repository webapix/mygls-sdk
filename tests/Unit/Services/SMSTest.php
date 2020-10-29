<?php

namespace Webapix\GLS\Tests\Unit\Services;

use Webapix\GLS\Services\SMS;
use Webapix\GLS\Tests\TestCase;

class SMSTest extends TestCase
{
    /** @test */
    public function it_can_set_the_sms_params()
    {
        $service = new SMS('+3630123456789', 'Your package is on its way to GLS facility!');

        $this->assertEquals([
            'Code' => 'SM1',
            'SM1Parameter' => [
                'Value' => '+3630123456789|Your package is on its way to GLS facility!',
            ],
        ], $service->toArray());
    }
}
