<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * Insurance Service.
 */
class Insurance implements Service
{
    /**
     * @var float
     */
    protected $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function toArray(): array
    {
        return [
            'Code' => 'INS',
            'INSParameter' => [
                'Value' => $this->value,
            ],
        ];
    }
}
