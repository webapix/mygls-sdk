<?php

namespace Webapix\GLS\Tests\Unit\Models;

use Webapix\GLS\Models\ParcelStatus;
use Webapix\GLS\Tests\Factories\ParcelStatusFactory;
use Webapix\GLS\Tests\TestCase;

class ParcelStatusTest extends TestCase
{
    /** @test */
    public function it_can_set_and_get_the_properties_correctly()
    {
        $parcelStatus = ParcelStatus::fromArray($data = ParcelStatusFactory::new()->create());

        $this->assertEquals($data['DepotNumber'], $parcelStatus->depotNumber());
        $this->assertEquals($data['DepotCity'], $parcelStatus->depotCity());
        $this->assertEquals($data['StatusCode'], $parcelStatus->statusCode());
        $this->assertEquals($data['StatusDate'], $parcelStatus->statusDate());
        $this->assertEquals($data['StatusDescription'], $parcelStatus->statusDescription());
        $this->assertEquals($data['StatusInfo'], $parcelStatus->statusInfo());
    }
}
