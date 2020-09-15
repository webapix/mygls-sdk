<?php

namespace Webapix\GLS\Exceptions;

use Exception;
use GuzzleHttp\Psr7\Response;

class RequestException extends Exception
{
    /**
     * The response instance.
     *
     * @var Response
     */
    public $response;

    public function __construct(Response $response)
    {
        parent::__construct("HTTP request returned status code {$response->getStatusCode()}.", $response->getStatusCode());

        $this->response = $response;
    }
}
