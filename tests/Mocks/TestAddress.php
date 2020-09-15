<?php

namespace Webapix\GLS\Tests\Mocks;

use Webapix\GLS\Contracts\Address;

class TestAddress implements Address
{
    public function name(): string
    {
        return 'Webapix Kft.';
    }

    public function street(): string
    {
        return 'Hűvösvölgyi út';
    }

    public function houseNumber(): string
    {
        return '54.';
    }

    public function houseNumberInfo(): string
    {
        return '2. épület 3. emelet';
    }

    public function city(): string
    {
        return 'Budapest';
    }

    public function zipCode(): string
    {
        return '1021';
    }

    public function countryIsoCode(): string
    {
        return '';
    }

    public function contactName(): string
    {
        return 'Webapix Kft.';
    }

    public function contactPhone(): string
    {
        return '+36100000000';
    }

    public function contactEmail(): string
    {
        return 'test@webapix.hu';
    }

    public function toArray(): array
    {
        return [
            'City' => $this->city(),
            'ContactEmail' => $this->contactEmail(),
            'ContactName' => $this->contactName(),
            'ContactPhone' => $this->contactPhone(),
            'CountryIsoCode' => $this->countryIsoCode(),
            'HouseNumber' => $this->houseNumber(),
            'Name' => $this->name(),
            'Street' => $this->street(),
            'ZipCode' => $this->zipCode(),
            'HouseNumberInfo' => $this->houseNumberInfo(),
        ];
    }
}
