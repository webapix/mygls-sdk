<?php

namespace Webapix\GLS\Tests\Unit\Models;

use Webapix\GLS\Models\ParcelInfo;
use Webapix\GLS\Tests\TestCase;

class ParcelInfoTest extends TestCase
{
    /** @test */
    public function it_can_return_with_parcel_info_data()
    {
        $parcelInfo = new ParcelInfo('test', 12345);

        $this->assertEquals('test', $parcelInfo->clientReference());
        $this->assertEquals(12345, $parcelInfo->parcelId());
    }
}
