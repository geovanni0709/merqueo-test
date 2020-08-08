<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Inventory\Domain;

use Merqueo\ApiRest\Inventory\Domain\Exceptions\InvalidTypeException;

/**
 * class InventoryWarehouseId
 */
final class InventoryWarehouseId
{
    /**
     * @var int
     */
    private $warehouseId;

    /**
     * @param int $warehouseId
     */
    public function __construct(int $warehouseId)
    {
        $this->setValue($warehouseId);
    }

    /**
     * Get value object
     * 
     * @return float
     */
    public function value()
    {
        return $this->warehouseId;
    }

    /**
     * Set value object
     * 
     * @param int $warehouseId
     */
    public function setValue(int $warehouseId): void
    {
        if ((int)$warehouseId <= 0) {
            throw new InvalidTypeException('Invalid type. Must be int');
        }

        $this->warehouseId = $warehouseId;
    }
}