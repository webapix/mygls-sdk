<?php

namespace Webapix\GLS\Services;

/**
 * AgreementAboutDangerousGoodsByRoad Service.
 */
class AgreementAboutDangerousGoodsByRoad
{
    /**
     * @var int
     */
    private $itemType;

    /**
     * @var int
     */
    private $amountUnit;

    /**
     * @var int
     */
    private $innerCount;

    /**
     * @var int
     */
    private $packSize;

    /**
     * @var int
     */
    private $unNumber;

    public function __construct(int $itemType, int $amountUnit, int $innerCount, int $packSize, int $unNumber)
    {
        $this->itemType = $itemType;
        $this->amountUnit = $amountUnit;
        $this->innerCount = $innerCount;
        $this->packSize = $packSize;
        $this->unNumber = $unNumber;
    }

    public function toArray(): array
    {
        return [
            'Code' => 'ADR',
            'ADRParameter' => [
                'AdrItemType' => $this->itemType,
                'AmountUnit' => $this->amountUnit,
                'InnerCount' => $this->innerCount,
                'PackSize' => $this->packSize,
                'UnNumber' => $this->unNumber,
            ],
        ];
    }
}
