<?php

namespace Webapix\GLS\Requests;

use Webapix\GLS\Contracts\Response;
use Webapix\GLS\Responses\GetParcelStatuses as GetParcelStatusesResponse;

class GetParcelStatuses extends Request
{
    /**
     * @var string
     */
    protected $endpoint = 'GetParcelStatuses';

    /**
     * @var int
     */
    protected $parcelNumber;

    /**
     * @var bool
     */
    protected $returnPod;

    public function __construct(int $parcelNumber, bool $returnPod = false)
    {
        $this->parcelNumber = $parcelNumber;
        $this->returnPod = $returnPod;
    }

    public function toArray(): array
    {
        return [
            'ParcelNumber' => $this->parcelNumber,
            'ReturnPOD' => $this->returnPod,
        ];
    }

    public function makeResponse(?array $data): Response
    {
        return new GetParcelStatusesResponse($data);
    }
}
