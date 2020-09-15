<?php

namespace Webapix\GLS\Tests\Unit\Responses;

use Webapix\GLS\Responses\ModifyCod;
use Webapix\GLS\Tests\TestCase;

class ModifyCODTest extends TestCase
{
    /** @test */
    public function it_can_check_if_cod_modifying_was_success()
    {
        $response = new ModifyCod(['Successful' => false]);
        $this->assertFalse($response->successfull());

        $response = new ModifyCod(['Successful' => true]);
        $this->assertTrue($response->successfull());
    }
}
