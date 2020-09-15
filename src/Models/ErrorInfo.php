<?php

namespace Webapix\GLS\Models;

class ErrorInfo
{
    /**
     * @var array
     */
    protected $error;

    public function __construct(array $error)
    {
        $this->error = $error;
    }

    public function code(): string
    {
        return $this->error['ErrorCode'];
    }

    public function message(): string
    {
        return $this->error['ErrorDescription'];
    }

    public function clientReferenceList(): array
    {
        return $this->error['ClientReferenceList'];
    }

    public function parcelIdList(): array
    {
        return $this->error['ParcelIdList'];
    }

    public function toArray(): array
    {
        return $this->error;
    }
}
