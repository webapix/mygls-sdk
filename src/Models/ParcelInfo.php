<?php

namespace Webapix\GLS\Models;

class ParcelInfo
{
    /**
     * @var null|string
     */
    protected $clientReference;

    /**
     * @var int
     */
    protected $parcelId;

    public function __construct(int $parcelId, ?string $clientReference = null)
    {
        $this->clientReference = $clientReference;
        $this->parcelId = $parcelId;
    }

    public function clientReference(): ?string
    {
        return $this->clientReference;
    }

    public function parcelId(): int
    {
        return $this->parcelId;
    }
}
