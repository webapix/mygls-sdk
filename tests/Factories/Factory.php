<?php

namespace Webapix\GLS\Tests\Factories;

abstract class Factory
{
    abstract public function create(array $extra = []);

    public function times(int $times, array $extra = [])
    {
        if ($times < 1) {
            return $this->create($extra);
        }

        return array_map(function () use ($extra) {
            return $this->create($extra);
        }, range(1, $times));
    }
}
