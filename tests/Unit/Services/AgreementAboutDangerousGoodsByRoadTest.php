<?php

namespace Webapix\GLS\Tests\Unit\Services;

use Webapix\GLS\Services\AgreementAboutDangerousGoodsByRoad;
use Webapix\GLS\Tests\TestCase;

class AgreementAboutDangerousGoodsByRoadTest extends TestCase
{
    /** @test */
    public function it_can_set_the_params()
    {
        $service = new AgreementAboutDangerousGoodsByRoad(2, 4, 1, 1, 1002);

        $this->assertEquals([
            'Code'         => 'ADR',
            'ADRParameter' => [
                'AdrItemType' => 2,
                'AmountUnit'  => 4,
                'InnerCount'  => 1,
                'PackSize'    => 1,
                'UnNumber'    => 1002,
            ],
        ], $service->toArray());
    }
}
