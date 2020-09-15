<?php

namespace Webapix\GLS\Services;

use Webapix\GLS\Contracts\Service;

/**
 * Guaranteed 24 Service.
 */
class Guaranteed24 implements Service
{
    public function toArray(): array
    {
        return [
            'Code' => '24H',
        ];
    }
}
