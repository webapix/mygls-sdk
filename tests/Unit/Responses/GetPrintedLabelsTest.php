<?php

namespace Webapix\GLS\Tests\Unit\Responses;

use Webapix\GLS\Responses\GetPrintedLabels;
use Webapix\GLS\Tests\Factories\PrintLabelsFactory;
use Webapix\GLS\Tests\TestCase;

class PrintPrintedLabelsTest extends TestCase
{
    /** @test */
    public function it_can_check_if_response_has_labels()
    {
        $response = new GetPrintedLabels(null);

        $this->assertFalse($response->hasLabels());

        $response = new GetPrintedLabels([
            'Labels' => [27],
        ]);

        $this->assertTrue($response->hasLabels());
    }

    /** @test */
    public function it_can_return_with_pdf()
    {
        $response = new GetPrintedLabels(null);
        $this->assertEmpty($response->getPdf());

        $response = new GetPrintedLabels(PrintLabelsFactory::new()->create());
        $this->assertNotEmpty($response->getPdf());
    }
}
