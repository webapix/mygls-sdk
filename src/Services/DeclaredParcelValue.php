<?php

namespace Webapix\GLS\Services;

/**
 * DeclaredParcelValue Service.
 */
class DeclaredParcelValue
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
