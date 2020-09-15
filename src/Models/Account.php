<?php

namespace Webapix\GLS\Models;

use Webapix\GLS\Contracts\Account as AccountContract;

class Account implements AccountContract
{
    protected $apiUrl;
    protected $clientNumber;
    protected $username;
    protected $passwordHash;

    public function __construct(string $apiUrl, string $clientNumber, string $username, string $password)
    {
        $this->apiUrl = $apiUrl;
        $this->clientNumber = $clientNumber;
        $this->username = $username;
        $this->passwordHash = $this->createPasswordHash($password);
    }

    public function apiURL(): string
    {
        return $this->apiUrl;
    }

    public function clientNumber(): string
    {
        return $this->clientNumber;
    }

    public function userName(): string
    {
        return $this->username;
    }

    public function passwordHash(): array
    {
        return $this->passwordHash;
    }

    protected function createPasswordHash(string $password)
    {
        return array_values(unpack('C*', hash('sha512', $password, true)));
    }
}
