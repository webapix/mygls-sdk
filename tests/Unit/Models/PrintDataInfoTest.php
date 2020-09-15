<?php

namespace Webapix\GLS\Tests\Unit\Models;

use Webapix\GLS\Models\Parcel;
use Webapix\GLS\Models\PrintDataInfo;
use Webapix\GLS\Tests\Factories\PrintDataInfoFactory;
use Webapix\GLS\Tests\TestCase;

class PrintDataInfoTest extends TestCase
{
    /** @test */
    public function it_can_set_and_get_the_properties_correctly()
    {
        $printDataInfo = PrintDataInfo::fromArray(
            $data = PrintDataInfoFactory::new()->create()
        );

        $this->assertInstanceOf(Parcel::class, $printDataInfo->parcel());
        $this->assertEquals($data['ParcelId'], $printDataInfo->parcelId());
        $this->assertEquals($data['ParcelNumber'], $printDataInfo->parcelNumber());
        $this->assertEquals($data['Sort'], $printDataInfo->sort());
        $this->assertEquals($data['ClientReference'], $printDataInfo->clientReference());
        $this->assertEquals($data['B2CChar'], $printDataInfo->B2CChar());
        $this->assertEquals($data['Depot'], $printDataInfo->depot());
        $this->assertEquals($data['Driver'], $printDataInfo->driver());
        $this->assertEquals($data['ParcelNumberWithCheckdigit'], $printDataInfo->parcelNumberWithCheckdigit());
        $this->assertEquals($data['DepotNumber'], $printDataInfo->depotNumber());
    }
}
