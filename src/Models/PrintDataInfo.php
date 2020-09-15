<?php

namespace Webapix\GLS\Models;

class PrintDataInfo
{
    /**
     * @var Parcel
     */
    protected $parcel;

    /**
     * @var int
     */
    protected $parcelId;

    /**
     * @var int
     */
    protected $parcelNumber;

    /**
     * @var int
     */
    protected $parcelNumberWithCheckdigit;

    /**
     * @var string
     */
    protected $depotNumber;

    /**
     * @var string
     */
    protected $driver;

    /**
     * @var string
     */
    protected $depot;

    /**
     * @var string
     */
    protected $sort;

    /**
     * @var string
     */
    protected $b2cChar;

    /**
     * @var string|null
     */
    protected $clientReference;

    public static function fromArray(array $data): PrintDataInfo
    {
        $printDataInfo = new PrintDataInfo();

        $printDataInfo->parcelId = $data['ParcelId'];
        $printDataInfo->parcelNumber = $data['ParcelNumber'];
        $printDataInfo->parcelNumberWithCheckdigit = $data['ParcelNumberWithCheckdigit'];
        $printDataInfo->sort = $data['Sort'];
        $printDataInfo->b2cChar = $data['B2CChar'];
        $printDataInfo->depot = $data['Depot'];
        $printDataInfo->clientReference = $data['ClientReference'];
        $printDataInfo->depotNumber = $data['DepotNumber'];
        $printDataInfo->driver = $data['Driver'];
        $printDataInfo->parcel = Parcel::fromArray($data['Parcel']);

        return $printDataInfo;
    }

    public function parcel(): Parcel
    {
        return $this->parcel;
    }

    public function parcelId(): int
    {
        return $this->parcelId;
    }

    public function parcelNumber(): int
    {
        return $this->parcelNumber;
    }

    public function parcelNumberWithCheckdigit(): int
    {
        return $this->parcelNumberWithCheckdigit;
    }

    public function depotNumber(): string
    {
        return $this->depotNumber;
    }

    public function driver(): string
    {
        return $this->driver;
    }

    public function depot(): string
    {
        return $this->depot;
    }

    public function sort(): string
    {
        return $this->sort;
    }

    public function b2cChar(): string
    {
        return $this->b2cChar;
    }

    public function clientReference(): ?string
    {
        return $this->clientReference;
    }
}
