<?php

namespace Webapix\GLS\Requests;

use Webapix\GLS\Contracts\Response;
use Webapix\GLS\Models\Parcel;
use Webapix\GLS\Responses\PrepareLabels as PrepareLabelsResponse;

class PrepareLabels extends Request
{
    /**
     * @var string
     */
    protected $endpoint = 'PrepareLabels';

    /** @var Parcel[] */
    protected $parcelList = [];

    public function addParcel(Parcel $parcel)
    {
        $this->parcelList[] = $parcel;
    }

    public function makeResponse(?array $data): Response
    {
        return new PrepareLabelsResponse($data);
    }

    public function toArray(): array
    {
        return [
            'ParcelList' => array_map(function (Parcel $parcel) {
                return $parcel->toArray();
            }, $this->parcelList),
        ];
    }
}
