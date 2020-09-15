<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * Flex Delivery Service.
 */
class FlexDelivery implements Service
{
    /**
     * @var string
     */
    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function toArray(): array
    {
        return [
            'Code' => 'FDS',
            'FDSParameter' => [
                'Value' => $this->email,
            ],
        ];
    }
}
