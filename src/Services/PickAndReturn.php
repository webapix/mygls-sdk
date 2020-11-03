<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * Pick & Return Service.
 */
class PickAndReturn implements Service
{
    public function toArray(): array
    {
        return [
            'Code' => 'PRS',
        ];
    }
}
