<?php

namespace Webapix\GLS\Responses;

use Webapix\GLS\Models\PrintDataInfo;

class GetPrintData extends Response
{
    protected $errorKey = 'GetPrintDataErrorList';

    protected $printDataInfo = [];

    public function printDataInfo(): array
    {
        if (! $this->printDataInfo) {
            $this->buildPrintDataInfo();
        }

        return $this->printDataInfo;
    }

    protected function buildPrintDataInfo(): void
    {
        if (empty($this->data['PrintDataInfoList'])) {
            return;
        }

        foreach ($this->data['PrintDataInfoList'] as $printDataInfo) {
            $this->printDataInfo[] = PrintDataInfo::fromArray($printDataInfo);
        }
    }
}
