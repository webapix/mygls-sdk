<?php

namespace Webapix\GLS\Models;

use Webapix\GLS\Contracts\Contact as ContactContract;

class Contact implements ContactContract
{
    /**
     * @var string
     */
    protected $contactName;

    /**
     * @var null|string
     */
    protected $contactPhone;

    /**
     * @var null|string
     */
    protected $contactEmail;

    public function __construct(string $contactName, ?string $contactPhone, ?string $contactEmail)
    {
        $this->setContactName($contactName);
        $this->setContactPhone($contactPhone);
        $this->setContactEmail($contactEmail);
    }

    public function setContactName(string $name): void
    {
        $this->contactName = $name;
    }

    public function setContactEmail(?string $email): void
    {
        $this->contactEmail = $email;
    }

    public function setContactPhone(?string $phone): void
    {
        $this->contactPhone = $phone;
    }

    public function contactName(): string
    {
        return $this->contactName;
    }

    public function contactPhone(): ?string
    {
        return $this->contactPhone;
    }

    public function contactEmail(): ?string
    {
        return $this->contactEmail;
    }

    public function toArray(): array
    {
        return [
            'ContactEmail' => $this->contactEmail(),
            'ContactName' => $this->contactName(),
            'ContactPhone' => $this->contactPhone(),
        ];
    }
}
