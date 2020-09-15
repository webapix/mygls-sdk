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
        $request = new PrintLabels;

        $request->addParcel($parcel1 = ParcelFactory::new()->model());
        $this->assertEquals([
            'ParcelList' => [$parcel1->toArray()],
            'PrintPosition' => 1,
            'ShowPrintDialog' => false,
        ], $request->toArray());

        $request->addParcel($parcel2 = ParcelFactory::new()->model());
        $this->assertEquals([
            'ParcelList' => [$parcel1->toArray(), $parcel2->toArray()],
            'PrintPosition' => 1,
            'ShowPrintDialog' => false,
        ], $request->toArray());
    }

    /** @test */
    public function it_can_change_the_print_position()
    {
        $request = new PrintLabels;
        $request->printPosition(2);

        $this->assertEquals([
            'ParcelList' => [],
            'PrintPosition' => 2,
            'ShowPrintDialog' => false,
        ], $request->toArray());
    }

    /** @test */
    public function it_can_show_the_print_dialog()
    {
        $request = new PrintLabels;
        $request->showPrintDialog();

        $this->assertEquals([
            'ParcelList' => [],
            'PrintPosition' => 1,
            'ShowPrintDialog' => true,
        ], $request->toArray());
    }

    /** @test */
    public function it_can_return_a_reponse()
    {
        $request = new PrintLabels;

        $this->assertInstanceOf(\Webapix\GLS\Responses\PrintLabels::class, $request->makeResponse([]));
    }
}
