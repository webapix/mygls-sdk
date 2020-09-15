<?php

namespace Webapix\GLS\Tests\Factories;

use Webapix\GLS\Models\PrintLabelsInfo;

class PrintLabelsInfoFactory extends Factory
{
    public static function new()
    {
        return new self();
    }

    public function create(array $extra = [])
    {
        return array_merge(
            [
                'ClientReference' => 'test',
                'ParcelId' => 12345,
                'ParcelNumber' => 54321,
            ],
            $extra
        );
    }

    public function model(array $extra = [])
    {
        return new PrintLabelsInfo(...array_values(
            $this->create($extra)
        ));
    }
}
