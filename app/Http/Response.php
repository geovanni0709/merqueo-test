<?php

declare(strict_types=1);

namespace App\Http;

use App\Http\ResponseInterface;

/**
 * class Response
 */
class Response implements ResponseInterface
{
    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    /**
     * @var array
     */
    private $data;

    /**
     * Get status code
     * 
     * @return string
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * Set status code
     * 
     * @param int $code
     * @return this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get status message
     * 
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Set status message
     * 
     * @param int $message
     * @return this
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get data
     * 
     * @return string
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Set data
     * 
     * @param int $data
     * @return this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get array of data
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'data' => $this->data
        ];
    }
}