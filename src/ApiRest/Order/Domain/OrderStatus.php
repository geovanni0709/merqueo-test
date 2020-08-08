<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Order\Domain;

use Merqueo\ApiRest\Order\Domain\Exceptions\InvalidTypeException;

/**
 * class OrderStatus
 */
final class OrderStatus
{   
    /**
     * @var array
     */
    const STATUS = [
        'pending',
        'proccesing',
        'completed',
        'close',
        'canecled'
    ];

    /**
     * @var string
     */
    private $status;

    /**
     * @param string $status
     */
    public function __construct(string $status)
    {
        $this->setValue($status);
    }

    /**
     * Get value object
     * 
     * @return string
     */
    public function value()
    {
        return $this->status;
    }

    /**
     * Set value object
     * 
     * @param string $status
     */
    public function setValue(string $status): void
    {
        if (empty($status) || $status === null || !in_array($status, self::STATUS)) {
            throw new InvalidTypeException('Invalid status.');
        }

        $this->status = $status;
    }
}