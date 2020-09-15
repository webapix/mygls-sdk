<?php

namespace Webapix\GLS\Requests;

use DateTime;
use Webapix\DotNetJsonDate\Date;
use Webapix\GLS\Contracts\Response;
use Webapix\GLS\Responses\GetParcelList as GetParcelListResponse;

class GetParcelList extends Request
{
    /**
     * @var string
     */
    protected $endpoint = 'GetParcelList';

    /**
     * @var DateTime
     */
    private $pickupDateFrom;

    /**
     * @var DateTime
     */
    private $pickupDateTo;

    /**
     * @var DateTime
     */
    private $printDateFrom;

    /**
     * @var DateTime
     */
    private $printDateTo;

    public function addPickupDateInterval(DateTime $pickupDateFrom, DateTime $pickupDateTo)
    {
        $this->pickupDateFrom = $pickupDateFrom;
        $this->pickupDateTo = $pickupDateTo;
    }

    public function addPrintDateInterval(DateTime $printDateFrom, DateTime $printDateTo)
    {
        $this->printDateFrom = $printDateFrom;
        $this->printDateTo = $printDateTo;
    }

    public function toArray(): array
    {
        return [
            'PickupDateFrom' => $this->pickupDateFrom ? Date::toJsonDate($this->pickupDateFrom) : null,
            'PickupDateTo' => $this->pickupDateTo ? Date::toJsonDate($this->pickupDateTo) : null,
            'PrintDateFrom' => $this->printDateFrom ? Date::toJsonDate($this->printDateFrom) : null,
            'PrintDateTo' => $this->printDateTo ? Date::toJsonDate($this->printDateTo) : null,
        ];
    }

    public function makeResponse(?array $data): Response
    {
        return new GetParcelListResponse($data);
    }
}
