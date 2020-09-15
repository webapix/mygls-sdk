<?php

namespace Webapix\GLS\Contracts;

interface Contact
{
    public function contactName(): string;

    public function contactPhone(): ?string;

    public function contactEmail(): ?string;

    public function toArray(): array;
}
