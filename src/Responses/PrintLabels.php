<?php

namespace Webapix\GLS\Responses;

use Webapix\GLS\Models\PrintLabelsInfo;

class PrintLabels extends Response
{
    protected $errorKey = 'PrintLabelsErrorList';

    protected $printLablesInfo = [];

    public function printLabelsInfo(): array
    {
        if (! $this->printLablesInfo) {
            $this->buildPrintLabelsInfoList();
        }

        return $this->printLablesInfo;
    }

    public function getPdf()
    {
        if (! $this->hasLabels()) {
            return null;
        }

        return implode(array_map('chr', $this->data()['Labels']));
    }

    public function hasLabels(): bool
    {
        return ! empty($this->data()['Labels']);
    }

    protected function buildPrintLabelsInfoList(): void
    {
        if (empty($this->data['PrintLabelsInfoList'])) {
            return;
        }

        foreach ($this->data['PrintLabelsInfoList'] as $printLabelInfo) {
            $this->printLablesInfo[] = new PrintLabelsInfo(
                $printLabelInfo['ClientReference'],
                $printLabelInfo['ParcelId'],
                $printLabelInfo['ParcelNumber']
            );
        }
    }
}
