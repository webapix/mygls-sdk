<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * Stand By Service.
 */
class StandBy implements Service
{
    public function toArray(): array
    {
        return [
            'Code' => 'SBS',
        ];
    }
}
