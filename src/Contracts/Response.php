<?php

namespace Webapix\GLS\Contracts;

use Webapix\GLS\ErrorCollection;

interface Response
{
    public function data(): ?array;

    public function successfull(): bool;

    public function errors(): ?ErrorCollection;
}
