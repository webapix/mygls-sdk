<?php

namespace Webapix\GLS\Requests;

use Webapix\GLS\Contracts\Response;
use Webapix\GLS\Models\Parcel;
use Webapix\GLS\Responses\PrintLabels as PrintLabelsResponse;

class PrintLabels extends Request
{
    /**
     * @var string
     */
    protected $endpoint = 'PrintLabels';

    /** @var Parcel[] */
    protected $parcelList = [];

    /**
     * @var int
     */
    protected $printPosition = 1;

    /**
     * @var null|string
     */
    protected $typeOfPrinter = null;

    /**
     * @var bool
     */
    protected $showPrintDialog = false;

    public function addParcel(Parcel $parcel)
    {
        $this->parcelList[] = $parcel;
    }

    public function printPosition(int $position)
    {
        $this->printPosition = $position;
    }

    public function showPrintDialog()
    {
        $this->showPrintDialog = true;
    }

    public function typeOfPrinter(string $type)
    {
        $this->typeOfPrinter = $type;
    }

    public function makeResponse(?array $data): Response
    {
        return new PrintLabelsResponse($data);
    }

    public function toArray(): array
    {
        $params = [
            'ParcelList' => array_map(function (Parcel $parcel) {
                return $parcel->toArray();
            }, $this->parcelList),
            'PrintPosition' => $this->printPosition,
            'ShowPrintDialog' => $this->showPrintDialog,
        ];

        if ($this->typeOfPrinter) {
            $params['TypeOfPrinter'] = $this->typeOfPrinter;
        }

        return $params;
    }
}
