<?php

namespace Webapix\GLS\Models;

use Webapix\GLS\Contracts\Address as AddressContract;

class Address extends Contact implements AddressContract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @var string
     */
    protected $zipCode;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $street;

    /**
     * @var string|null
     */
    protected $houseNumber;

    /**
     * @var string|null
     */
    protected $houseNumberInfo;

    public function __construct(
        string $name,
        string $countryCode,
        string $zipCode,
        string $city,
        string $street,
        ?string $houseNumber)
    {
        $this->name = $name;
        $this->countryCode = $countryCode;
        $this->zipCode = $zipCode;
        $this->city = $city;
        $this->street = $street;
        $this->houseNumber = $houseNumber;
    }

    public function setHouseNumberInfo(?string $info): void
    {
        $this->houseNumberInfo = $info;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function street(): string
    {
        return $this->street;
    }

    public function houseNumber(): ?string
    {
        return $this->houseNumber;
    }

    public function houseNumberInfo(): ?string
    {
        return $this->houseNumberInfo;
    }

    public function city(): string
    {
        return $this->city;
    }

    public function zipCode(): string
    {
        return $this->zipCode;
    }

    public function countryIsoCode(): string
    {
        return $this->countryCode;
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
