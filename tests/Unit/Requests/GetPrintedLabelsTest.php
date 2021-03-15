<?php

namespace Webapix\GLS\Tests\Unit\Requests;

use Webapix\GLS\Requests\GetPrintedLabels;
use Webapix\GLS\Tests\TestCase;

class GetPrintedLabelsTest extends TestCase
{
    /** @test */
    public function it_can_set_parcel_ids()
    {
        $request = new GetPrintedLabels;

        $request->addParcelId(1);
        $this->assertEquals([
            'ParcelIdList' => [1],
            'PrintPosition' => 1,
            'ShowPrintDialog' => false,
        ], $request->toArray());

        $request->addParcelId(2);
        $this->assertEquals([
            'ParcelIdList' => [1, 2],
            'PrintPosition' => 1,
            'ShowPrintDialog' => false,
        ], $request->toArray());
    }

    /** @test */
    public function it_can_change_the_print_position()
    {
        $request = new GetPrintedLabels;
        $request->printPosition(2);

        $this->assertEquals([
            'ParcelIdList' => [],
            'PrintPosition' => 2,
            'ShowPrintDialog' => false,
        ], $request->toArray());
    }

    /** @test */
    public function it_can_show_the_print_dialog()
    {
        $request = new GetPrintedLabels;
        $request->showPrintDialog();

        $this->assertEquals([
            'ParcelIdList' => [],
            'PrintPosition' => 1,
            'ShowPrintDialog' => true,
        ], $request->toArray());
    }

    /** @test */
    public function it_can_set_the_type_of_printer()
    {
        $request = new GetPrintedLabels;
        $request->typeOfPrinter('Thermo');

        $this->assertEquals([
            'ParcelIdList' => [],
            'PrintPosition' => 1,
            'ShowPrintDialog' => false,
            'TypeOfPrinter' => 'Thermo',
        ], $request->toArray());
    }

    /** @test */
    public function it_can_return_a_response()
    {
        $request = new GetPrintedLabels;

        $this->assertInstanceOf(\Webapix\GLS\Responses\GetPrintedLabels::class, $request->makeResponse([]));
    }
}
