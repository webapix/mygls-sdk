<?php

namespace Webapix\GLS\Requests;

use Webapix\GLS\Contracts\Response;
use Webapix\GLS\Models\Parcel;
use Webapix\GLS\Responses\GetPrintData as GetPrintDataResponse;

class GetPrintData extends Request
{
    /**
     * @var string
     */
    protected $endpoint = 'GetPrintData';

    /** @var Parcel[] */
    protected $parcelList = [];

    /** @var int[] */
    protected $parcelIdList = [];

    public function addParcel(Parcel $parcel)
    {
        $this->parcelList[] = $parcel;
    }

    public function addParcelId(int $id)
    {
        $this->parcelIdList[] = $id;
    }

    public function makeResponse(?array $data): Response
    {
        return new GetPrintDataResponse($data);
    }

    public function toArray(): array
    {
        return [
            'ParcelList' => array_map(function (Parcel $parcel) {
                return $parcel->toArray();
            }, $this->parcelList),
            'ParcelIdList' => $this->parcelIdList,
        ];
    }
}
