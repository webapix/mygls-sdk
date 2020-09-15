<?php

namespace Webapix\GLS\Tests\Factories;

class PrintLabelsFactory extends Factory
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
                'PrintLabelsErrorList' => $this->success ? [] : [
                    ErrorInfoFactory::new()->create(),
                ],
                'PrintLabelsInfoList' => $this->success ? [
                    PrintLabelsInfoFactory::new()->create(),
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
