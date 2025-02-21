<?php

namespace Webapix\GLS\Tests\Unit\Requests;

use Webapix\GLS\Requests\PrintLabels;
use Webapix\GLS\Tests\Factories\ParcelFactory;
use Webapix\GLS\Tests\TestCase;

class PrintLabelsTest extends TestCase
{
    /** @test */
    public function it_can_set_parcels()
    {
        $request = new PrintLabels('Laravel');

        $request->addParcel($parcel1 = ParcelFactory::new()->model());
        $this->assertEquals([
            'ParcelList' => [$parcel1->toArray()],
            'PrintPosition' => 1,
            'ShowPrintDialog' => false,
            'WebshopEngine' => 'Laravel',
        ], $request->toArray());

        $request->addParcel($parcel2 = ParcelFactory::new()->model());
        $this->assertEquals([
            'ParcelList' => [$parcel1->toArray(), $parcel2->toArray()],
            'PrintPosition' => 1,
            'ShowPrintDialog' => false,
            'WebshopEngine' => 'Laravel',
        ], $request->toArray());
    }

    /** @test */
    public function it_can_change_the_print_position()
    {
        $request = new PrintLabels('Laravel');
        $request->printPosition(2);

        $this->assertEquals([
            'ParcelList' => [],
            'PrintPosition' => 2,
            'ShowPrintDialog' => false,
            'WebshopEngine' => 'Laravel',
        ], $request->toArray());
    }

    /** @test */
    public function it_can_show_the_print_dialog()
    {
        $request = new PrintLabels('Laravel');
        $request->showPrintDialog();

        $this->assertEquals([
            'ParcelList' => [],
            'PrintPosition' => 1,
            'ShowPrintDialog' => true,
            'WebshopEngine' => 'Laravel',
        ], $request->toArray());
    }

    /** @test */
    public function it_can_set_the_type_of_printer()
    {
        $request = new PrintLabels('Laravel');
        $request->typeOfPrinter('Thermo');

        $this->assertEquals([
            'ParcelList' => [],
            'PrintPosition' => 1,
            'ShowPrintDialog' => false,
            'TypeOfPrinter' => 'Thermo',
            'WebshopEngine' => 'Laravel',
        ], $request->toArray());
    }

    /** @test */
    public function it_can_return_a_response()
    {
        $request = new PrintLabels('Laravel');

        $this->assertInstanceOf(\Webapix\GLS\Responses\PrintLabels::class, $request->makeResponse([]));
    }
}
