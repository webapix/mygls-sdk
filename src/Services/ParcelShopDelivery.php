<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * Parcel Shop Delivery service.
 */
class ParcelShopDelivery implements Service
{
    /**
     * @var string
     */
    protected $dropOffPointId;

    public function __construct(string $dropOffPointId)
    {
        $this->dropOffPointId = $dropOffPointId;
    }

    public function toArray(): array
    {
        return [
            'Code' => 'PSD',
            'PSDParameter' => [
                'StringValue' => $this->dropOffPointId,
            ],
        ];
    }
}
