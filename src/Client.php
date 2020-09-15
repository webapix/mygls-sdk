<?php

namespace Webapix\GLS;

use GuzzleHttp\Client as HttpClient;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use Webapix\GLS\Contracts\Account;
use Webapix\GLS\Contracts\Request;
use Webapix\GLS\Contracts\Response;
use Webapix\GLS\Exceptions\RequestException;

class Client
{
    /**
     * @var Account
     */
    protected $account;

    /**
     * @var HttpClient
     */
    private $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    public function on(Account $account): self
    {
        $this->account = $account;

        return $this;
    }

    public function request(Request $request): Response
    {
        if (! $this->account) {
            throw new InvalidArgumentException('You need to define an account to make a request!');
        }

        $response = $this->client->request(
            $request->getMethod(),
            rtrim($this->account->apiURL(), '/').'/'.$request->getEndpoint(),
            [
                'json' => $this->payload($request),
                'http_errors' => false,
            ]
        );

        if (! $this->successful($response)) {
            throw new RequestException($response);
        }

        return $this->decodeResponse(
            $response,
            $request
        );
    }

    protected function decodeResponse(ResponseInterface $response, Request $request): Response
    {
        return $request->makeResponse(
            json_decode(
                $response->getBody()->getContents(),
                true
            )
        );
    }

    protected function successful(ResponseInterface $response): bool
    {
        return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300;
    }

    public function payload(Request $request): array
    {
        return array_merge($request->toArray(), [
            'Username' => $this->account->userName(),
            'Password' => $this->account->passwordHash(),
        ]);
    }
}
