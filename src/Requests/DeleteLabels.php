<?php

namespace Webapix\GLS\Requests;

use Webapix\GLS\Contracts\Response;
use Webapix\GLS\Responses\DeleteLabels as DeleteLabelsResponse;

class DeleteLabels extends Request
{
    /**
     * @var string
     */
    protected $endpoint = 'DeleteLabels';

    /** @var int[] */
    protected $parcelIdList = [];

    public function addParcelId(int $id)
    {
        $this->parcelIdList[] = $id;
    }

    public function makeResponse(?array $data): Response
    {
        return new DeleteLabelsResponse($data);
    }

    public function toArray(): array
    {
        return [
            'ParcelIdList' => $this->parcelIdList,
        ];
    }
}
