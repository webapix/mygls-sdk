<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * Pick & Ship Service.
 */
class PickAndShip implements Service
{
    public function toArray(): array
    {
        return [
            'Code' => 'PSS',
        ];
    }
}
