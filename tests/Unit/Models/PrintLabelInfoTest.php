<?php

namespace Webapix\GLS\Tests\Unit\Models;

use Webapix\GLS\Models\PrintLabelsInfo;
use Webapix\GLS\Tests\TestCase;

class PrintLabelInfoTest extends TestCase
{
    /** @test */
    public function it_can_return_with_label_info_data()
    {
        $printLabelInfo = new PrintLabelsInfo(12345, 35678912, 'test');

        $this->assertEquals('test', $printLabelInfo->clientReference());
        $this->assertEquals(12345, $printLabelInfo->parcelId());
        $this->assertEquals(35678912, $printLabelInfo->parcelNumber());

        $printLabelInfo = new PrintLabelsInfo(35678912, 12345, null);

        $this->assertNull($printLabelInfo->clientReference());
    }
}
