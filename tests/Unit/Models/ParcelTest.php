<?php

namespace Webapix\GLS\Tests\Unit\Models;

use Webapix\GLS\Contracts\Address;
use Webapix\GLS\Models\Parcel;
use Webapix\GLS\Services\ParcelShopDelivery;
use Webapix\GLS\Services\SMS;
use Webapix\GLS\Tests\Mocks\TestAddress;
use Webapix\GLS\Tests\TestCase;

class ParcelTest extends TestCase
{
    /** @test */
    public function it_can_set_a_parcel_with_fluent_syntax()
    {
        $parcel = (new Parcel)
            ->setClientNumber('123456789')
            ->setClientReference('order-1')
            ->setPickupAddress(new TestAddress)
            ->setDeliveryInfo(new TestAddress)
            ->setCodAmount(1000)
            ->setCodReference('#order-1')
            ->setContent('Comment')
            ->addService(new ParcelShopDelivery('15496'))
            ->addService(new SMS('+363012312312', 'Your package is on its way to GLS facility'));

        $this->assertEquals(123456789, $parcel->getClientNumber());
        $this->assertEquals('order-1', $parcel->getClientReference());
        $this->assertEquals(1000, $parcel->getCodAmount());
        $this->assertEquals('#order-1', $parcel->getCodReference());
        $this->assertEquals('Comment', $parcel->getContent());
        $this->assertEquals(1, $parcel->getCount());
        $this->assertEquals(null, $parcel->getPickupDate());
        $this->assertInstanceOf(TestAddress::class, $parcel->getPickupAddress());
        $this->assertInstanceOf(Address::class, $parcel->getDeliveryInfo());
        $this->assertEquals('Budapest', $parcel->getDeliveryInfo()->city());
        $this->assertCount(2, $parcel->getServices());
    }

    /** @test */
    public function parcel_count_has_a_default_value()
    {
        $parcel = (new Parcel())
            ->toArray();

        $this->assertEquals(1, $parcel['Count']);
    }

    /** @test */
    public function it_can_format_services()
    {
        $parcel = (new Parcel)
            ->addService(new ParcelShopDelivery('15496'));

        $this->assertCount(1, $parcel->toArray()['ServiceList']);
        $this->assertEquals([
            'Code' => 'PSD',
            'PSDParameter' => [
                'StringValue' => 15496,
            ], ], $parcel->toArray()['ServiceList'][0]);
    }

    /** @test */
    public function cod_amount_can_be_nullable()
    {
        $parcel = (new Parcel)
            ->setCodAmount(null);

        $this->assertNull($parcel->getCodAmount());
    }
}
