<?php

namespace Webapix\GLS\Services;

use DateTime;
use Webapix\DotNetJsonDate\Date;
use Webapix\GLS\Contracts\Service;

/**
 * Scheduled Delivery Service.
 */
class ScheduledDelivery implements Service
{
    /**
     * @var DateTime
     */
    protected $timeFrom;

    /**
     * @var DateTime
     */
    protected $timeTo;

    public function __construct(DateTime $timeFrom, DateTime $timeTo)
    {
        $this->timeFrom = $timeFrom;
        $this->timeTo = $timeTo;
    }

    public function toArray(): array
    {
        return [
            'Code' => 'SDS',
            'SDSParameter' => [
                'TimeFrom' => Date::toJsonDate($this->timeFrom),
                'TimeTo' => Date::toJsonDate($this->timeTo),
            ],
        ];
    }
}
