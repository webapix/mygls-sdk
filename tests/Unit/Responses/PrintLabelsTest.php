<?php

namespace Webapix\GLS\Tests\Unit\Responses;

use Webapix\GLS\ErrorCollection;
use Webapix\GLS\Responses\PrintLabels;
use Webapix\GLS\Tests\Factories\PrintLabelsFactory;
use Webapix\GLS\Tests\Factories\PrintLabelsInfoFactory;
use Webapix\GLS\Tests\TestCase;

class PrintLabelsTest extends TestCase
{
    /** @test */
    public function it_can_check_if_response_has_labels()
    {
        $response = new PrintLabels(null);

        $this->assertFalse($response->hasLabels());

        $response = new PrintLabels([
            'Labels' => 'dummy label data',
        ]);

        $this->assertTrue($response->hasLabels());
    }

    /** @test */
    public function it_can_fill_with_data()
    {
        $data = [
            'dummy' => 'data',
        ];

        $response = new PrintLabels($data);

        $this->assertEquals($data, $response->data());
    }

    /** @test */
    public function it_can_check_if_response_is_successfull()
    {
        $response = new PrintLabels(null);
        $this->assertFalse($response->successfull());

        $response = new PrintLabels(PrintLabelsFactory::new()->failed()->create());
        $this->assertFalse($response->successfull());

        $response = new PrintLabels(PrintLabelsFactory::new()->create());
        $this->assertTrue($response->successfull());
    }

    /** @test */
    public function it_can_return_with_the_error_list()
    {
        $response = new PrintLabels(null);
        $this->assertNull($response->errors());

        $response = new PrintLabels(PrintLabelsFactory::new()->failed()->create());
        $this->assertInstanceOf(ErrorCollection::class, $response->errors());
        $this->assertEquals(1, $response->errors()->count());

        $response = new PrintLabels(PrintLabelsFactory::new()->create());
        $this->assertNull($response->errors());
    }

    /** @test */
    public function it_can_return_with_print_labels_info()
    {
        $response = new PrintLabels(null);
        $this->assertEmpty($response->printLabelsInfo());

        $response = new PrintLabels(PrintLabelsFactory::new()->create());

        $this->assertCount(1, $response->printLabelsInfo());
        $this->assertEquals(PrintLabelsInfoFactory::new()->model(), $response->printLabelsInfo()[0]);
    }

    /** @test */
    public function array_access()
    {
        $response = new PrintLabels($data = PrintLabelsFactory::new()->create());

        $this->assertFalse(isset($response['non-existant']));
        $this->assertTrue(isset($response['Labels']));

        $this->assertEquals($data['Labels'], $response['Labels']);
    }

    /** @test */
    public function it_can_return_with_pdf()
    {
        $response = new PrintLabels(null);
        $this->assertEmpty($response->getPdf());

        $response = new PrintLabels(PrintLabelsFactory::new()->create());
        $this->assertNotEmpty($response->getPdf());
    }
}
