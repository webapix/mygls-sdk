<?php

namespace Webapix\GLS\Tests\Unit\Models;

use Webapix\GLS\Tests\Factories\ErrorInfoFactory;
use Webapix\GLS\Tests\TestCase;

class ErrorInfoTest extends TestCase
{
    private $errorInfo;

    public function setUp(): void
    {
        parent::setUp();

        $this->errorInfo = ErrorInfoFactory::new()->model(['ParcelIdList' => [904851696]]);
    }

    /** @test */
    public function it_can_get_error_data()
    {
        $this->assertEquals(26, $this->errorInfo->code());
        $this->assertEquals('Something went wrong.', $this->errorInfo->message());
        $this->assertEquals([], $this->errorInfo->clientReferenceList());
        $this->assertEquals([904851696], $this->errorInfo->parcelIdList());

        $this->assertEquals([
            'ErrorCode' => 26,
            'ErrorDescription' => 'Something went wrong.',
            'ClientReferenceList' => [],
            'ParcelIdList' => [904851696],
        ], $this->errorInfo->toArray());
    }
}
