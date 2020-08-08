<?php

declare(strict_types=1);

namespace App\Http;

/**
 * interface ResponseInterface
 */
interface ResponseInterface
{
    /**
     * @var int
     */
    const NO_CONTENT = 204;

    /**
     * @var int
     */
    const OK = 200;

    /**
     * @var int
     */
    const BAD_REQUEST = 400;

    /**
     * @var int
     */
    const NOT_FOUND = 404;

    /**
     * @var int
     */
    const ERROR = 500;

    /**
     * Contract getCode
     * 
     * @return string
     */
    public function getCode(): int;

    /**
     * Contract setCode
     * 
     * @param int $code
     * @return this
     */
    public function setCode($code);

    /**
     * Contract getMessage
     * 
     * @return string
     */
    public function getMessage(): string;

    /**
     * Contract setMessage
     * 
     * @param int $message
     * @return this
     */
    public function setMessage($message);

    /**
     * Contract getData
     * 
     * @return string
     */
    public function getData(): array;

    /**
     * Contract setData
     * 
     * @param int $data
     * @return this
     */
    public function setData($data);

    /**
     * Contract toArray
     * 
     * @return array
     */
    public function toArray(): array;
}