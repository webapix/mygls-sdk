<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * DeclaredParcelValue Service.
 */
class DeclaredParcelValue implements Service
{
    /**
     * @var string
     */
    private $stringValue;

    /**
     * @var int
     */
    private $decimalValue;

    public function __construct(string $stringValue, int $decimalValue)
    {
        $this->stringValue = $stringValue;
        $this->decimalValue = $decimalValue;
    }

    public function toArray(): array
    {
        return [
            'Code' => 'DPV',
            'DPVParameter' => [
                'StringValue' => $this->stringValue,
                'DecimalValue' => $this->decimalValue,
            ],
        ];
    }
}
