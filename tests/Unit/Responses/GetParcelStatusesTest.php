<?php

namespace Webapix\GLS\Tests\Unit\Responses;

use Webapix\GLS\Models\ParcelStatus;
use Webapix\GLS\Responses\GetParcelStatuses;
use Webapix\GLS\Tests\Factories\GetParcelStatusesFactory;
use Webapix\GLS\Tests\TestCase;

class GetParcelStatusesTest extends TestCase
{
    /** @test */
    public function it_can_return_with_parcel_status_list()
    {
        $response = new GetParcelStatuses([]);
        $this->assertEmpty($response->parcelStatusList());

        $response = new GetParcelStatuses($data = GetParcelStatusesFactory::new()->create());

        $parcelStatusList = $response->parcelStatusList();

        $this->assertIsArray($parcelStatusList);
        foreach ($parcelStatusList as $parcelStatus) {
            $this->assertInstanceOf(ParcelStatus::class, $parcelStatus);
        }
    }

    /** @test */
    public function it_can_return_with_pod_pdf()
    {
        $response = new GetParcelStatuses([]);
        $this->assertEmpty($response->getPODPdf());

        $response = new GetParcelStatuses($data = GetParcelStatusesFactory::new()->create(['POD' => [27]]));
        $this->assertNotEmpty($response->getPODPdf());
    }
}
