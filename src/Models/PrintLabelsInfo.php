<?php

namespace Webapix\GLS\Models;

class PrintLabelsInfo extends ParcelInfo
{
    /**
     * @var int
     */
    protected $parcelNumber;

    public function __construct(string $clientReference, int $parcelId, int $parcelNumber)
    {
        parent::__construct($clientReference, $parcelId);

        $this->parcelNumber = $parcelNumber;
    }

    public function parcelNumber(): int
    {
        return $this->parcelNumber;
    }
}
