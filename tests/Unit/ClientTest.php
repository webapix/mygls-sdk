<?php

namespace Webapix\GLS\Tests\Unit;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Response;
use Mockery as m;
use Webapix\GLS\Client;
use Webapix\GLS\Contracts\Account;
use Webapix\GLS\Exceptions\RequestException;
use Webapix\GLS\Models\Account as AccountModel;
use Webapix\GLS\Requests\GetParcelStatuses;
use Webapix\GLS\Responses\GetParcelStatuses as GetParcelStatusesResponse;
use Webapix\GLS\Tests\TestCase;

class ClientTest extends TestCase
{
    /**
     * @var HttpClient|\Mockery\LegacyMockInterface|\Mockery\MockInterface
     */
    private $mockHttpClient;

    /**
     * @var Client
     */
    private $clientGLS;

    public function setUp(): void
    {
        parent::setUp();

        $this->mockHttpClient = m::mock(HttpClient::class);
        $this->clientGLS = new Client($this->mockHttpClient);
    }

    /** @test */
    public function it_can_perform_an_request()
    {
        $account = $this->account();

        $this->mockHttpClient
            ->shouldReceive('request')
            ->once()
            ->with(
                'POST',
                $account->apiURL().'GetParcelStatuses',
                m::on(function ($arg) {
                    return is_array($arg) && isset($arg['json']);
                })
            )
            ->andReturn(new Response(200, [], json_encode([])))
            ->getMock();

        $this->clientGLS
            ->on($account)
            ->request(new GetParcelStatuses(123456789));
    }

    public function account(): Account
    {
        return new AccountModel(
            'https://api.test.mygls.hu/ParcelService.svc/json/',
            12345,
            'test',
            'test'
        );
    }

    /** @test */
    public function it_can_return_with_correct_response()
    {
        $account = $this->account();
        $testResponseData = ['test' => true];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->andReturn(new Response(200, [], json_encode($testResponseData)))
            ->getMock();

        $response = $this->clientGLS
            ->on($account)
            ->request(new GetParcelStatuses(123456789));

        $this->assertInstanceOf(GetParcelStatusesResponse::class, $response);
        $this->assertEquals($testResponseData, $response->data());
    }

    /** @test */
    public function it_can_handle_the_empty_response_body()
    {
        $account = $this->account();

        $this->mockHttpClient
            ->shouldReceive('request')
            ->andReturn(new Response(200, []))
            ->getMock();

        $response = $this->clientGLS
            ->on($account)
            ->request(new GetParcelStatuses(123456789));

        $this->assertNull($response->data());
    }

    /** @test */
    public function it_can_build_the_correct_payload()
    {
        $account = $this->account();

        $exceptedSubset = [
            'json' => [
                'ParcelNumber' => 123456789,
                'ReturnPOD' => false,
                'Username' => $account->userName(),
            ],
            'http_errors' => false,
        ];

        $this->mockHttpClient
            ->shouldReceive('request')
            ->with(m::any(), m::any(), m::subset($exceptedSubset))
            ->andReturn(new Response(200, []))
            ->getMock();

        $this->clientGLS
            ->on($account)
            ->request(new GetParcelStatuses(123456789));
    }

    /** @test */
    public function it_throw_an_exception_if_account_is_not_specified()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->clientGLS
            ->request(new GetParcelStatuses(123456789));
    }

    /** @test */
    public function it_throw_an_exception_if_http_request_is_not_success()
    {
        $this->expectException(RequestException::class);

        $this->mockHttpClient
            ->shouldReceive('request')
            ->withAnyArgs()
            ->andReturn(new Response(500, []))
            ->getMock();

        $this->clientGLS
            ->on($this->account())
            ->request(new GetParcelStatuses(123456789));
    }
}
