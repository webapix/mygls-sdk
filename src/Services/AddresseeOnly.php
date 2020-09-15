<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * Addressee Only Service.
 */
class AddresseeOnly implements Service
{
    /**
     * @var string
     */
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function toArray(): array
    {
        return [
            'Code' => 'AOS',
            'AOSParameter' => [
                'Value' => $this->name,
            ],
        ];
    }
}
