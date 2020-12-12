<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * Contact Service.
 */
class Contact implements Service
{
    /**
     * @var string
     */
    protected $phone;

    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    public function toArray(): array
    {
        return [
            'Code' => 'CS1',
            'CS1Parameter' => [
                'Value' => $this->phone,
            ],
        ];
    }
}
