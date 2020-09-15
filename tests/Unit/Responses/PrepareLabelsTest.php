<?php

namespace Webapix\GLS\Tests\Unit\Responses;

use Webapix\GLS\Models\ParcelInfo;
use Webapix\GLS\Responses\PrepareLabels;
use Webapix\GLS\Tests\TestCase;

class PrepareLabelsTest extends TestCase
{
    /** @test */
    public function it_can_return_with_parcel_info_list()
    {
        $response = new PrepareLabels(null);
        $this->assertEmpty($response->parcelInfoList());

        $data = [
            'PrepareLabelsError' => [],
            'ParcelInfoList' => [
                [
                    'ClientReference' => 'test',
                    'ParcelId' => 12345,
                ],
            ],
        ];

        $response = new PrepareLabels($data);

        $parcelInfoList = $response->parcelInfoList();

        $this->assertIsArray($parcelInfoList);
        foreach ($parcelInfoList as $parcelInfo) {
            $this->assertInstanceOf(ParcelInfo::class, $parcelInfo);
        }
    }
}
