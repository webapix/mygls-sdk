<?php

namespace Webapix\GLS\Tests\Unit\Responses;

use Webapix\GLS\Models\PrintDataInfo;
use Webapix\GLS\Responses\GetPrintData;
use Webapix\GLS\Tests\Factories\PrintDataFactory;
use Webapix\GLS\Tests\TestCase;

class GetPrintDataTest extends TestCase
{
    /** @test */
    public function it_can_return_with_print_data_info_list()
    {
        $response = new GetPrintData(null);
        $this->assertEmpty($response->printDataInfo());

        $response = new GetPrintData($data = PrintDataFactory::new()->create());

        $printDataInfoList = $response->printDataInfo();

        $this->assertIsArray($printDataInfoList);
        foreach ($printDataInfoList as $printDataInfo) {
            $this->assertInstanceOf(PrintDataInfo::class, $printDataInfo);
        }
    }
}
