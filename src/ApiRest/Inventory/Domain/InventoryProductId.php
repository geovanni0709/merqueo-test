<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Inventory\Domain;

use Merqueo\ApiRest\Inventory\Domain\Exceptions\InvalidTypeException;

/**
 * class InventoryProductId
 */
final class InventoryProductId
{
    /**
     * @var int
     */
    private $productId;

    /**
     * @param int $productId
     */
    public function __construct(int $productId)
    {
        $this->setValue($productId);
    }
    
    /**
     * Get value object
     * 
     * @return int
     */
    public function value()
    {
        return $this->productId;
    }

    /**
     * Set value object
     * 
     * @param int $productId
     */
    public function setValue(int $productId): void
    {
        if ((int)$productId <= 0) {
            throw new InvalidTypeException('Invalid type. Must be int');
        }

        $this->productId = $productId;
    }
}