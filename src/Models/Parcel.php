<?php

namespace Webapix\GLS\Models;

use DateTime;
use Webapix\DotNetJsonDate\Date;
use Webapix\GLS\Contracts\Address;
use Webapix\GLS\Contracts\Contact as ContactContract;
use Webapix\GLS\Contracts\Service;
use Webapix\GLS\Models\Address as AddressModel;

class Parcel
{
    /**
     * @var string
     */
    protected $clientNumber;

    /**
     * @var string
     */
    protected $clientReference;

    /**
     * @var int
     */
    protected $count = 1;

    /**
     * @var float
     */
    protected $codAmount = 0;

    /**
     * @var string|null
     */
    protected $codReference;

    /**
     * @var string|null
     */
    protected $content;

    /**
     * @var DateTime|null
     */
    protected $pickupDate;

    /**
     * @var Address|null
     */
    protected $pickupAddress;

    /**
     * @var ContactContract|null
     */
    protected $deliveryInfo;

    /**
     * @var Service[]
     */
    protected $services = [];

    public function getClientNumber(): ?int
    {
        return $this->clientNumber;
    }

    public function setClientNumber(int $clientNumber): self
    {
        $this->clientNumber = $clientNumber;

        return $this;
    }

    public function getClientReference(): ?string
    {
        return $this->clientReference;
    }

    public function setClientReference(string $clientReference): self
    {
        $this->clientReference = $clientReference;

        return $this;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    public function getCodAmount(): float
    {
        return $this->codAmount;
    }

    public function setCodAmount(float $codAmount): self
    {
        $this->codAmount = $codAmount;

        return $this;
    }

    public function getCodReference(): string
    {
        return $this->codReference;
    }

    public function setCodReference(string $codReference): self
    {
        $this->codReference = $codReference;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPickupDate(): ?DateTime
    {
        return $this->pickupDate;
    }

    public function setPickupDate(DateTime $pickupDate): self
    {
        $this->pickupDate = $pickupDate;

        return $this;
    }

    public function getPickupAddress(): ?Address
    {
        return $this->pickupAddress;
    }

    public function setPickupAddress(Address $pickupAddress): self
    {
        $this->pickupAddress = $pickupAddress;

        return $this;
    }

    public function getDeliveryInfo(): ?ContactContract
    {
        return $this->deliveryInfo;
    }

    public function setDeliveryInfo(ContactContract $deliveryInfo): self
    {
        $this->deliveryInfo = $deliveryInfo;

        return $this;
    }

    /**
     * @return Service[]
     */
    public function getServices(): array
    {
        return $this->services;
    }

    /**
     * @param  Service[]  $services
     * @return Parcel
     */
    public function setServices(array $services): Parcel
    {
        $this->services = $services;

        return $this;
    }

    public function addService(Service $service): self
    {
        $this->services[] = $service;

        return $this;
    }

    public function when(bool $value, callable $callback)
    {
        if ($value) {
            return $callback($this);
        }

        return $this;
    }

    public function toArray(): array
    {
        return [
            'ClientNumber' => $this->clientNumber,
            'ClientReference' => $this->clientReference,
            'CODAmount' => $this->codAmount,
            'CODReference' => $this->codReference,
            'Content' => $this->content,
            'Count' => $this->count,
            'Count' => $this->count,
            'DeliveryAddress' => $this->deliveryInfo ? $this->deliveryInfo->toArray() : null,
            'PickupAddress' => $this->pickupAddress ? $this->pickupAddress->toArray() : null,
            'PickupDate' => $this->formatPickupDate(),
            'ServiceList' => $this->formatServices(),
        ];
    }

    public static function fromArray(array $data): Parcel
    {
        $parcel = new Parcel();

        $parcel->when(isset($data['ClientNumber']), function (Parcel $parcel) use ($data) {
            return $parcel->setClientNumber($data['ClientNumber']);
        });

        $parcel->when(isset($data['ClientReference']), function (Parcel $parcel) use ($data) {
            return $parcel->setClientReference($data['ClientReference']);
        });

        $parcel->when(isset($data['CODAmount']), function (Parcel $parcel) use ($data) {
            return $parcel->setCodAmount($data['CODAmount']);
        });

        $parcel->when(isset($data['CODReference']), function (Parcel $parcel) use ($data) {
            return $parcel->setCodReference($data['CODReference']);
        });

        $parcel->when(isset($data['Content']), function (Parcel $parcel) use ($data) {
            return $parcel->setContent($data['Content']);
        });

        $parcel->when(isset($data['Count']), function (Parcel $parcel) use ($data) {
            return $parcel->setCount($data['Count']);
        });

        $parcel->when(isset($data['PickupDate']), function (Parcel $parcel) use ($data) {
            return $parcel->setPickupDate(Date::toDateTime($data['PickupDate']));
        });

        $parcel->when(isset($data['DeliveryAddress']), function (Parcel $parcel) use ($data) {
            $address = $parcel->createAddress($data['DeliveryAddress']);

            return $parcel->setDeliveryInfo($address);
        });

        $parcel->when(isset($data['PickupAddress']), function (Parcel $parcel) use ($data) {
            $address = $parcel->createAddress($data['PickupAddress']);

            return $parcel->setPickupAddress($address);
        });

        return $parcel;
    }

    protected function createAddress(array $addressData): Address
    {
        $address = new AddressModel(
            $addressData['Name'],
            $addressData['CountryIsoCode'],
            $addressData['ZipCode'],
            $addressData['City'],
            $addressData['Street'],
            $addressData['HouseNumber']
        );

        $address->setContactName($addressData['ContactName']);
        $address->setContactPhone($addressData['ContactPhone']);
        $address->setContactEmail($addressData['ContactEmail']);
        $address->setHouseNumberInfo($addressData['HouseNumberInfo']);

        return $address;
    }

    protected function formatPickupDate(): string
    {
        if (! $this->pickupDate) {
            return (new Date)->toJsonDate(new DateTime);
        }

        return (new Date)->toJsonDate($this->pickupDate);
    }

    protected function formatServices(): array
    {
        return array_map(function ($service) {
            return $service->toArray();
        }, $this->services);
    }
}
