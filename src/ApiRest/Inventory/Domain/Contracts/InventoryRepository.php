<?php

namespace Merqueo\ApiRest\Inventory\Domain\Contracts;

use Merqueo\ApiRest\Inventory\Domain\InventoryEntity;
use Merqueo\ApiRest\Inventory\Domain\InventoryProductId;
use Merqueo\ApiRest\Inventory\Domain\InventoryDate;

/**
 * interface InventoryRepository
 */
interface InventoryRepository
{
    /**
     * Contract getProductCanDelivery
     * 
     * @return array
     */
    public function getProductCanDelivery(): array;

    /**
     * Contract getProductDeliveryProvider
     * 
     * @return array
     */
    public function getProductDeliveryProvider(): array;

    /**
     * Contract getInventoryByProductId
     * 
     * @param InventoryProductId $productId
     * @return array
     */
    public function getInventoryByProductId(InventoryProductId $productId): array;

    /**
     * Contract calculateInvetoryNextDay
     * 
     * @param InventoryDate $date
     * @return array
     */
    public function calculateInventoryNextDay(InventoryDate $date): array;

    /**
     * Contract save
     * 
     * @param InventoryEntity $inventory
     * @return void
     */
    public function save(InventoryEntity $inventory): void;
}