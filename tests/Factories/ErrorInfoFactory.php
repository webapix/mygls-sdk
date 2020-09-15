<?php

namespace Webapix\GLS\Tests\Factories;

use Webapix\GLS\Models\ErrorInfo;

class ErrorInfoFactory extends Factory
{
    public static function new()
    {
        return new self();
    }

    public function create(array $extra = [])
    {
        return array_merge(
            [
                'ErrorCode' => 26,
                'ErrorDescription' => 'Something went wrong.',
                'ClientReferenceList' => [],
                'ParcelIdList' => [],
            ],
            $extra
        );
    }

    public function model(array $extra = [])
    {
        return new ErrorInfo($this->create($extra));
    }
}
