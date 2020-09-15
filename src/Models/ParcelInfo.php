<?php

namespace Webapix\GLS\Models;

class ParcelInfo
{
    /**
     * @var string
     */
    protected $clientReference;

    /**
     * @var int
     */
    protected $parcelId;

    public function __construct(string $clientReference, int $parcelId)
    {
        $this->clientReference = $clientReference;
        $this->parcelId = $parcelId;
    }

    public function clientReference(): string
    {
        return $this->clientReference;
    }

    public function parcelId(): int
    {
        return $this->parcelId;
    }
}
