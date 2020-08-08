<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Inventory\Domain;

use Merqueo\ApiRest\Inventory\Domain\InventoryProductId;

/**
 * class InventoryEntity
 */
final class InventoryEntity
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var InventoryWarehouseId
     */
    private $warehouseId;

    /**
     * @var InventoryProductId
     */
    private $productId;

    /**
     * @var InventoryDate
     */
    private $inventoryDate;

    /**
     * @var InventoryQty
     */
    private $qty;

    public function __construct(
        InventoryProductId $productId,
        InventoryWarehouseId $warehouseId,
        InventoryQty $qty,
        InventoryDate $inventoryDate,
        ?int $id
    ){
        $this->productId = $productId;
        $this->warehouseId = $warehouseId;
        $this->inventoryDate = $inventoryDate;
        $this->qty = $qty;
        $this->id = $id;
    }

    /**
     * Return an instance of same class from array data
     * 
     * @param array $data
     * @return this
     */
    public static function fromArray(array $data): self
    {
        return new self(
            new InventoryProductId((int)$data['product_id']),
            new InventoryWarehouseId((int)$data['warehouse_id']),
            new InventoryQty((float)$data['qty']),
            new InventoryDate($data['inventory_date']),
            (int)$data['id']
        );
    }

    /**
     * Identitity
     * 
     * @return mixed null|int
     */
    public function id(): ?int
    {
        return $this->id;
    }

    /**
     * Product Id VO
     * 
     * @return InventoryProductId
     */
    public function productId(): InventoryProductId
    {
        return $this->productId;
    }

    /**
     * Warehouse Id VO
     * 
     * @return InventoryWarehouseId
     */
    public function warehouseId(): InventoryWarehouseId
    {
        return $this->warehouseId;
    }

    /**
     * Qty VO
     * 
     * @return InventoryQty
     */
    public function qty(): InventoryQty
    {
        return $this->qty;
    }

    /**
     * Inventory date VO
     * 
     * @return InventoryDate
     */
    public function inventoryDate(): InventoryDate
    {
        return $this->inventoryDate;
    }

    /**
     * Conver to array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id()->value(),
            'produc_id' => $this->productId()->value(),
            'warehouse_id' => $this->warehouseId()->value(),
            'qty' => $this->qty()->value(),
            'inventory_date' => $this->inventoryDate()->value()
        ];
    }
}