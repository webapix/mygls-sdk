<?php

namespace Webapix\GLS\Responses;

class GetPrintedLabels extends Response
{
    protected $errorKey = 'GetPrintedLabelsErrorList';

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
}
