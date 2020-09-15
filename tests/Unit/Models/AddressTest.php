<?php

namespace Webapix\GLS\Tests\Unit\Unit\Models;

use Webapix\GLS\Models\Address;
use Webapix\GLS\Tests\TestCase;

class AddressTest extends TestCase
{
    /** @test */
    public function it_can_set_and_get_the_properties_correctly()
    {
        $address = new Address(
            'Test Name',
            'HU',
            '1021',
            'Budapest',
            'Hűvösvölgyi út',
            '54'
        );

        $address->setContactName('Contact Person name');
        $address->setContactPhone('Contact Person phone');
        $address->setContactEmail('Contact Person email');
        $address->setHouseNumberInfo('2. épület 3. emelet');

        $this->assertEquals('Test Name', $address->name());
        $this->assertEquals('HU', $address->countryIsoCode());
        $this->assertEquals('1021', $address->zipCode());
        $this->assertEquals('Budapest', $address->city());
        $this->assertEquals('Hűvösvölgyi út', $address->street());
        $this->assertEquals('54', $address->houseNumber());
        $this->assertEquals('2. épület 3. emelet', $address->houseNumberInfo());
        $this->assertEquals('Contact Person name', $address->contactName());
        $this->assertEquals('Contact Person email', $address->contactEmail());
        $this->assertEquals('Contact Person phone', $address->contactPhone());
    }
}
