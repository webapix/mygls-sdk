<?php

namespace Webapix\GLS\Requests;

use Webapix\GLS\Contracts\Response;
use Webapix\GLS\Responses\GetPrintedLabels as GetPrintedLabelsResponse;

class GetPrintedLabels extends Request
{
    /**
     * @var string
     */
    protected $endpoint = 'GetPrintedLabels';

    /** @var int[] */
    protected $parcelIdList = [];

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

    public function addParcelId(int $id)
    {
        $this->parcelIdList[] = $id;
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
        return new GetPrintedLabelsResponse($data);
    }

    public function toArray(): array
    {
        $params = [
            'ParcelIdList' => $this->parcelIdList,
            'PrintPosition' => $this->printPosition,
            'ShowPrintDialog' => $this->showPrintDialog,
        ];

        if ($this->typeOfPrinter) {
            $params['TypeOfPrinter'] = $this->typeOfPrinter;
        }

        return $params;
    }
}
