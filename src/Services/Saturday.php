<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * Saturday service.
 */
class Saturday implements Service
{
    public function toArray(): array
    {
        return [
            'Code' => 'SAT',
        ];
    }
}
