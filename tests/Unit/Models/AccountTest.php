<?php

namespace Webapix\GLS\Tests\Unit\Models;

use Webapix\GLS\Models\Account;
use Webapix\GLS\Tests\TestCase;

class AccountTest extends TestCase
{
    /** @test */
    public function it_can_set_and_get_the_properties_correctly()
    {
        $account = new Account(
            'test_url',
            '1234567',
            'test',
            'test2'
        );

        $this->assertEquals('test_url', $account->apiURL());
        $this->assertEquals('test', $account->userName());
        $this->assertEquals('1234567', $account->clientNumber());
        $this->assertIsArray($account->passwordHash());
    }
}
