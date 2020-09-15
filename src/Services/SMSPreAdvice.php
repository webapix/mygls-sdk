<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * SMSPreAdvice service.
 */
class SMSPreAdvice implements Service
{
    /**
     * @var string
     */
    protected $phoneNumber;

    public function __construct(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function toArray(): array
    {
        return [
            'Code' => 'SM2',
            'SM2Parameter' => [
                'StringValue' => $this->phoneNumber,
            ],
        ];
    }
}
