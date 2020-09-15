<?php

namespace Webapix\GLS\Requests;

use Webapix\GLS\Contracts\Response;
use Webapix\GLS\Responses\ModifyCod as ModifyCodResponse;

class ModifyCod extends Request
{
    /**
     * @var string
     */
    protected $endpoint = 'ModifyCOD';

    /**
     * @var int
     */
    protected $parcelId;

    /**
     * @var int
     */
    protected $parcelNumber;

    /**
     * @var float
     */
    protected $codAmount;

    public function __construct(int $parcelId, int $parcelNumber, float $codAmount)
    {
        $this->parcelId = $parcelId;
        $this->parcelNumber = $parcelNumber;
        $this->codAmount = $codAmount;
    }

    public function makeResponse(?array $data): Response
    {
        return new ModifyCodResponse($data);
    }

    public function toArray(): array
    {
        return [
            'ParcelId' => $this->parcelId,
            'ParcelNumber' => $this->parcelNumber,
            'CODAmount' => $this->codAmount,
        ];
    }
}
