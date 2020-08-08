<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Inventory\Domain;

use Merqueo\ApiRest\Inventory\Domain\Exceptions\InvalidTypeException;

/**
 * class InventoryQty
 */
final class InventoryQty
{
    /**
     * @var float
     */
    private $qty;

    /**
     * @param float $qty
     */
    public function __construct(float $qty)
    {
        $this->setValue($qty);
    }

    /**
     * Get value object
     * 
     * @return float
     */
    public function value()
    {
        return $this->qty;
    }

    /**
     * Set value object
     * 
     * @param float $qty
     */
    public function setValue(float $qty): void
    {
        if ((int)$qty < 0) {
            throw new InvalidTypeException('Invalid type. Must be float');
        }

        $this->qty = $qty;
    }
}