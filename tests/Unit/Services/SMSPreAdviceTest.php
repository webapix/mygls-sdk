<?php

namespace Webapix\GLS\Tests\Unit\Services;

use Webapix\GLS\Services\SMSPreAdvice;
use Webapix\GLS\Tests\TestCase;

class SMSPreAdviceTest extends TestCase
{
    /** @test */
    public function it_can_set_the_sms_params()
    {
        $service = new SMSPreAdvice('+3630123456789');

        $this->assertEquals([
            'Code' => 'SM2',
            'SM2Parameter' => [
                'StringValue' => '+3630123456789',
            ],
        ], $service->toArray());
    }
}
