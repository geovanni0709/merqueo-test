<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Delivery\Domain;

use Merqueo\ApiRest\Delivery\Domain\Exceptions\InvalidTypeException;

/**
 * class DeliveryOrderId
 */
final class DeliveryOrderId
{
    /**
     * @var int
     */
    private $orderId;

    /**
     * @param int $orderId
     */
    public function __construct(int $orderId)
    {
        $this->setValue($orderId);
    }
    
    /**
     * Get value object
     * 
     * @return int
     */
    public function value()
    {
        return $this->orderId;
    }

    /**
     * Set value object
     * 
     * @param int $orderId
     */
    public function setValue(int $orderId): void
    {
        if ((int)$orderId <= 0) {
            throw new InvalidTypeException('Invalid type. Must be int');
        }

        $this->orderId = $orderId;
    }
}