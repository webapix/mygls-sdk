<?php

namespace Webapix\GLS\Responses;

use ArrayAccess;
use Webapix\GLS\Contracts\Response as ResponseContract;
use Webapix\GLS\ErrorCollection;

abstract class Response implements ResponseContract, ArrayAccess
{
    /**
     * @var array|null
     */
    protected $data;

    /**
     * @var string
     */
    protected $errorKey;

    public function __construct(?array $data)
    {
        $this->data = $data;
    }

    public function data(): ?array
    {
        return $this->data;
    }

    public function successfull(): bool
    {
        return $this->data && empty($this->data[$this->errorKey]);
    }

    public function errors(): ?ErrorCollection
    {
        if (empty($this->data[$this->errorKey])) {
            return null;
        }

        return new ErrorCollection($this->data[$this->errorKey]);
    }

    /**
     * Determine if the given offset exists.
     *
     * @param  string  $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * Get the value for a given offset.
     *
     * @param  string  $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    /**
     * Set the value at the given offset.
     *
     * @param  string  $offset
     * @param  mixed  $value
     * @return void
     *
     * @throws \LogicException
     */
    public function offsetSet($offset, $value)
    {
        throw new LogicException('Response data may not be mutated using array access.');
    }

    /**
     * Unset the value at the given offset.
     *
     * @param  string  $offset
     * @return void
     *
     * @throws \LogicException
     */
    public function offsetUnset($offset)
    {
        throw new LogicException('Response data may not be mutated using array access.');
    }
}
