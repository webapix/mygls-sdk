<?php

namespace Webapix\GLS\Responses;

use Webapix\GLS\Models\ParcelInfo;

class PrepareLabels extends Response
{
    protected $errorKey = 'PrepareLabelsError';

    protected $parcelList = [];

    public function parcelInfoList(): array
    {
        if (! $this->parcelList) {
            $this->buildParcelInfoList();
        }

        return $this->parcelList;
    }

    protected function buildParcelInfoList(): void
    {
        if (empty($this->data['ParcelInfoList'])) {
            return;
        }

        foreach ($this->data['ParcelInfoList'] as $parcelInfo) {
            $this->parcelList[] = new ParcelInfo($parcelInfo['ParcelId'], $parcelInfo['ClientReference']);
        }
    }
}
