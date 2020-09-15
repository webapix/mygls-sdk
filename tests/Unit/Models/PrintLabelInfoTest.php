<?php

namespace Webapix\GLS\Tests\Unit\Models;

use Webapix\GLS\Models\PrintLabelsInfo;
use Webapix\GLS\Tests\TestCase;

class PrintLabelInfoTest extends TestCase
{
    /** @test */
    public function it_can_return_with_label_info_data()
    {
        $printLabelInfo = new PrintLabelsInfo('test', 12345, 35678912);

        $this->assertEquals('test', $printLabelInfo->clientReference());
        $this->assertEquals(12345, $printLabelInfo->parcelId());
        $this->assertEquals(35678912, $printLabelInfo->parcelNumber());
    }
}
