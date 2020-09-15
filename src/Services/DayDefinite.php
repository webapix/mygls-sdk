<?php

namespace Webapix\GLS\Services;

use DateTime;
use Webapix\DotNetJsonDate\Date;
use Webapix\GLS\Contracts\Service;

/**
 * Day Definite Service.
 */
class DayDefinite implements Service
{
    /**
     * @var DateTime
     */
    protected $date;

    public function __construct(DateTime $date)
    {
        $this->date = $date;
    }

    public function toArray(): array
    {
        return [
            'Code' => 'DDS',
            'DDSParameter' => [
                'Value' => Date::toJsonDate($this->date),
            ],
        ];
    }
}
