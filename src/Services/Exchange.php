<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * Exchange Service.
 */
class Exchange implements Service
{
    public function toArray(): array
    {
        return [
            'Code' => 'XS',
        ];
    }
}
