<?php

namespace Webapix\GLS\Models;

class ParcelStatus
{
    /**
     * @var string
     */
    protected $depotCity;

    /**
     * @var string
     */
    protected $depotNumber;

    /**
     * @var string
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $statusDate;

    /**
     * @var string
     */
    protected $statusDescription;

    /**
     * @var string
     */
    protected $statusInfo;

    public static function fromArray(array $data): self
    {
        $parcelStatus = new static();

        $parcelStatus->depotCity = $data['DepotCity'];
        $parcelStatus->depotNumber = $data['DepotNumber'];
        $parcelStatus->statusCode = $data['StatusCode'];
        $parcelStatus->statusDate = $data['StatusDate'];
        $parcelStatus->statusDescription = $data['StatusDescription'];
        $parcelStatus->statusInfo = $data['StatusInfo'];

        return $parcelStatus;
    }

    public function depotCity(): string
    {
        return $this->depotCity;
    }

    public function depotNumber(): string
    {
        return $this->depotNumber;
    }

    public function statusCode(): string
    {
        return $this->statusCode;
    }

    public function statusDate(): string
    {
        return $this->statusDate;
    }

    public function statusDescription(): string
    {
        return $this->statusDescription;
    }

    public function statusInfo(): string
    {
        return $this->statusInfo;
    }
}
