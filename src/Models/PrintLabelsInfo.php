<?php

namespace Webapix\GLS\Models;

class PrintLabelsInfo extends ParcelInfo
{
    /**
     * @var int
     */
    protected $parcelNumber;

    public function __construct(int $parcelId, int $parcelNumber, ?string $clientReference = null)
    {
        parent::__construct($parcelId, $clientReference);

        $this->parcelNumber = $parcelNumber;
    }

    public function parcelNumber(): int
    {
        return $this->parcelNumber;
    }
}
