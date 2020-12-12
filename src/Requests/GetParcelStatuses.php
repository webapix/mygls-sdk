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

    /**
     * @var string
     */
    protected $languageIsoCode;

    public function __construct(int $parcelNumber, bool $returnPod = false, string $languageIsoCode = 'EN')
    {
        $this->parcelNumber = $parcelNumber;
        $this->returnPod = $returnPod;
        $this->languageIsoCode = $languageIsoCode;
    }

    public function setLanguageIsoCode(string $code)
    {
        $this->languageIsoCode = $code;
    }

    public function returnWithPodFile()
    {
        $this->returnPod = true;
    }

    public function toArray(): array
    {
        return [
            'ParcelNumber' => $this->parcelNumber,
            'ReturnPOD' => $this->returnPod,
            'LanguageIsoCode' => $this->languageIsoCode,
        ];
    }

    public function makeResponse(?array $data): Response
    {
        return new GetParcelStatusesResponse($data);
    }
}
