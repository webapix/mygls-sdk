<?php

namespace Webapix\GLS\Tests\Unit\Models;

use Webapix\GLS\Models\Contact;
use Webapix\GLS\Tests\TestCase;

class ContactTest extends TestCase
{
    /** @test */
    public function it_can_set_and_get_the_properties_correctly()
    {
        $contact = new Contact(
            'Test Name',
            '+3630123456789',
            'test@example.com'
        );

        $this->assertEquals('Test Name', $contact->contactName());
        $this->assertEquals('test@example.com', $contact->contactEmail());
        $this->assertEquals('+3630123456789', $contact->contactPhone());
        $this->assertEquals([
            'ContactEmail' => $contact->contactEmail(),
            'ContactName' => $contact->contactName(),
            'ContactPhone' => $contact->contactPhone(),
        ], $contact->toArray());
    }
}
