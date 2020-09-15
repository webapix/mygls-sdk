<?php

namespace Webapix\GLS;

use Webapix\GLS\Models\ErrorInfo;

class ErrorCollection
{
    /**
     * @var ErrorInfo[]
     */
    protected $errors = [];

    public function __construct(array $errors)
    {
        $this->errors = array_map(function ($error) {
            return new ErrorInfo($error);
        }, $errors);
    }

    public function all(): array
    {
        return $this->errors;
    }

    public function has(string $code): bool
    {
        return $this->get($code) !== null;
    }

    public function get(string $code): ?ErrorInfo
    {
        foreach ($this->errors as $errorInfo) {
            if ($errorInfo->code() === $code) {
                return $errorInfo;
            }
        }

        return null;
    }

    public function count(): int
    {
        return count($this->errors);
    }

    public function first(): ?ErrorInfo
    {
        return $this->errors[0] ?? null;
    }

    public function hasAny(): bool
    {
        return ! empty($this->errors);
    }

    public function firstErrorMessage(): ?string
    {
        if (! $this->first()) {
            return null;
        }

        return $this->first()->message();
    }

    public function firstErrorCode(): ?string
    {
        if (! $this->first()) {
            return null;
        }

        return $this->first()->code();
    }
}
