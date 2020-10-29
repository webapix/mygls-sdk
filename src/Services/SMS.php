<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * SMS service.
 */
class SMS implements Service
{
    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @var string
     */
    protected $text;

    public function __construct(string $phoneNumber, string $text)
    {
        $this->phoneNumber = $phoneNumber;
        $this->text = $text;
    }

    public function toArray(): array
    {
        return [
            'Code' => 'SM1',
            'SM1Parameter' => [
                'Value' => $this->phoneNumber.'|'.$this->text,
            ],
        ];
    }
}
