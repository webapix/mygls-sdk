<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * Flex Delivery SMS Service.
 */
class FlexDeliverySMS implements Service
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
            'Code' => 'FSS',
            'FSSParameter' => [
                'Value' => $this->phone,
            ],
        ];
    }
}
