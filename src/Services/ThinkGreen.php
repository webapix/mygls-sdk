<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * Think Green Service.
 */
class ThinkGreen implements Service
{
    public function toArray(): array
    {
        return [
            'Code' => 'TGS',
        ];
    }
}
