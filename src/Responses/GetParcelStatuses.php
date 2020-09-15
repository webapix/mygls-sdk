<?php

namespace Webapix\GLS\Responses;

use Webapix\GLS\Models\ParcelStatus;

class GetParcelStatuses extends Response
{
    /**
     * @var string
     */
    protected $errorKey = 'GetParcelStatusErrors';

    /**
     * @var array
     */
    protected $parcelStatusList = [];

    public function parcelStatusList(): array
    {
        if (! $this->parcelStatusList) {
            $this->buildParcelStatusList();
        }

        return $this->parcelStatusList;
    }

    public function getPODPdf()
    {
        if (empty($this->data()['POD'])) {
            return null;
        }

        return implode(array_map('chr', $this->data()['POD']));
    }

    protected function buildParcelStatusList(): void
    {
        if (empty($this->data['ParcelStatusList'])) {
            return;
        }

        foreach ($this->data['ParcelStatusList'] as $parcelStatus) {
            $this->parcelStatusList[] = ParcelStatus::fromArray($parcelStatus);
        }
    }
}
