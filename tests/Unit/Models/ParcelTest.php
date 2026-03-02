<?php

namespace Webapix\GLS\Tests\Unit\Models;

use Webapix\GLS\Contracts\Address;
use Webapix\GLS\Models\Parcel;
use Webapix\GLS\Services\ParcelShopDelivery;
use Webapix\GLS\Services\SMS;
use Webapix\GLS\Tests\Factories\ParcelFactory;
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
            ->setCodCurrency('EUR')
            ->setContent('Comment')
            ->addService(new ParcelShopDelivery('15496'))
            ->addService(new SMS('+363012312312', 'Your package is on its way to GLS facility'));

        $this->assertEquals(123456789, $parcel->getClientNumber());
        $this->assertEquals('order-1', $parcel->getClientReference());
        $this->assertEquals(1000, $parcel->getCodAmount());
        $this->assertEquals('#order-1', $parcel->getCodReference());
        $this->assertEquals('EUR', $parcel->getCodCurrency());
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

    /** @test */
    public function it_can_create_from_array_when_contact_information_is_missing()
    {
        $data = ParcelFactory::new()->create([
            'DeliveryAddress' => [
                'City' => 'Sülysáp',
                'ContactPhone' => '+3630123456789',
                'CountryIsoCode' => 'HU',
                'HouseNumber' => '1',
                'HouseNumberInfo' => null,
                'Name' => 'Delivery Address Name',
                'Street' => 'Delivery Address Street',
                'ZipCode' => 'Delivery Address ZipCode',
            ],
        ]);

        $parcel = Parcel::fromArray($data);

        $this->assertNull($parcel->getDeliveryInfo()->contactName());
        $this->assertNull($parcel->getDeliveryInfo()->contactEmail());
    }

    /** @test */
    public function it_preserves_house_number_info_and_does_not_override_contact_name()
    {
        $data = ParcelFactory::new()->create([
            'DeliveryAddress' => [
                'City' => 'Sülysáp',
                'ContactEmail' => 'test@example.com',
                'ContactName' => 'Test Test',
                'ContactPhone' => '+3630123456789',
                'CountryIsoCode' => 'HU',
                'HouseNumber' => '1',
                'HouseNumberInfo' => '2. épület 3. emelet',
                'Name' => 'Delivery Address Name',
                'Street' => 'Delivery Address Street',
                'ZipCode' => 'Delivery Address ZipCode',
            ],
        ]);

        $parcel = Parcel::fromArray($data);

        $this->assertInstanceOf(Address::class, $parcel->getDeliveryInfo());
        $this->assertEquals('2. épület 3. emelet', $parcel->getDeliveryInfo()->houseNumberInfo());
        $this->assertEquals('Test Test', $parcel->getDeliveryInfo()->contactName());
    }

    /** @test */
    public function it_sets_house_number_info_when_contact_name_is_missing()
    {
        $data = ParcelFactory::new()->create([
            'DeliveryAddress' => [
                'City' => 'Sülysáp',
                'ContactPhone' => '+3630123456789',
                'CountryIsoCode' => 'HU',
                'HouseNumber' => '1',
                'HouseNumberInfo' => 'B épület',
                'Name' => 'Delivery Address Name',
                'Street' => 'Delivery Address Street',
                'ZipCode' => 'Delivery Address ZipCode',
            ],
        ]);

        $parcel = Parcel::fromArray($data);

        $this->assertInstanceOf(Address::class, $parcel->getDeliveryInfo());
        $this->assertEquals('B épület', $parcel->getDeliveryInfo()->houseNumberInfo());
        $this->assertNull($parcel->getDeliveryInfo()->contactName());
    }

    /** @test */
    public function it_preserves_house_number_info_on_pickup_address()
    {
        $data = ParcelFactory::new()->create([
            'PickupAddress' => [
                'City' => 'Budapest',
                'ContactEmail' => 'test@example.com',
                'ContactName' => 'Pickup Contact',
                'ContactPhone' => '+3620123456789',
                'CountryIsoCode' => 'HU',
                'HouseNumber' => '6',
                'HouseNumberInfo' => 'A lépcsőház',
                'Name' => 'Test name',
                'Street' => 'street',
                'ZipCode' => '12345',
            ],
        ]);

        $parcel = Parcel::fromArray($data);

        $this->assertInstanceOf(Address::class, $parcel->getPickupAddress());
        $this->assertEquals('A lépcsőház', $parcel->getPickupAddress()->houseNumberInfo());
        $this->assertEquals('Pickup Contact', $parcel->getPickupAddress()->contactName());
    }
}
