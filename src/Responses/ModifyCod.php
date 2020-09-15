<?php

namespace Webapix\GLS\Responses;

class ModifyCod extends Response
{
    protected $errorKey = 'ModifyCODError';

    public function successfull(): bool
    {
        return $this->data['Successful'];
    }
}
