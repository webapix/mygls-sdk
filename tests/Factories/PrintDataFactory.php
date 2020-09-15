<?php

namespace Webapix\GLS\Tests\Factories;

class PrintDataFactory extends Factory
{
    private $success = true;

    public static function new()
    {
        return new self();
    }

    public function create(array $extra = [])
    {
        return array_merge(
            [
                'Labels' => $this->success ? [1, 2, 3] : [],
                'GetPrintDataErrorList' => $this->success ? [] : [
                    ErrorInfoFactory::new()->create(),
                ],
                'PrintDataInfoList' => $this->success ? [
                    PrintDataInfoFactory::new()->create(),
                ] : [],
            ],
            $extra
        );
    }

    public function failed()
    {
        $this->success = false;

        return $this;
    }
}
