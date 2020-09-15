<?php

namespace Webapix\GLS\Contracts;

interface Account
{
    public function apiURL(): string;

    public function clientNumber(): string;

    public function userName(): string;

    public function passwordHash(): array;
}
