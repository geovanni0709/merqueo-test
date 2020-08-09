<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Inventory\Infraestructure\Persistence\Eloquent;

use Illuminate\Support\Facades\DB;
use Merqueo\ApiRest\Inventory\Domain\Contracts\InventoryRepository as InventoryRepositoryInterface;
use Merqueo\ApiRest\Inventory\Domain\InventoryEntity;
use Merqueo\ApiRest\Inventory\Domain\InventoryProductId;
use Merqueo\ApiRest\Inventory\Domain\InventoryDate;

/**
 * class InventoryRepository
 */
final class InventoryRepository implements InventoryRepositoryInterface
{
    /**
     * Get product can be delivery
     * 
     * @return array
     */
    public function getProductCanDelivery(): array
    {
        return DB::table('inventory')
            ->distinct()
            ->select(
                'order.id as order_id',
                'priority',
                'inventory.warehouse_id',
                'product.sku',
                'product.name',
                'order_item.qty as ordered_qty',
                'inventory.qty as inventory_qty',
                'inventory.inventory_date'
            )
            ->join('order_item', function($join) {
                $join->on('inventory.product_id', '=', 'order_item.product_id');
                $join->on('order_item.qty', '<=', 'inventory.qty');
            })
            ->join('order', 'order_item.order_id', '=', 'order.id')
            ->join('product', 'order_item.product_id', '=', 'product.id')
            ->orderBy('priority')
            ->get()->toArray();
    }

    /**
     * Get product can be delivery by providers
     * 
     * @return array
     */
    public function getProductDeliveryProvider(): array
    {
        return DB::table('inventory')
            ->distinct()
            ->select(
                'order.id as order_id',
                'priority',
                'inventory.warehouse_id',
                'product.sku',
                'product.name',
                'inventory.inventory_date',
                'order_item.qty as ordered_qty',
                'inventory.qty as inventory_qty',
                'provider.name as provider_name',
                DB::raw('order_item.qty-inventory.qty as provider_qty')
            )
            ->join('order_item', function($join) {
                $join->on('inventory.product_id', '=', 'order_item.product_id');
                $join->on('order_item.qty', '>', 'inventory.qty');
            })
            ->join('order', 'order_item.order_id', '=', 'order.id')
            ->join('product', 'order_item.product_id', '=', 'product.id')
            ->join('provider_product', 'product.id', '=', 'provider_product.product_id')
            ->join('provider', 'provider_product.provider_id', '=', 'provider.id')
            ->orderBy('priority')
            ->get()->toArray();
    }

    /**
     * Get inventory by product
     * 
     * @param InventoryProductId $productId
     * @return array
     */
    public function getInventoryByProductId(InventoryProductId $productId): array
    {
        return DB::table('inventory')
            ->select(
                'inventory.id',
                'inventory.warehouse_id',
                'product.sku',
                'product.name',
                'inventory.qty',
                'inventory.inventory_date'
            )
            ->join('product', 'inventory.product_id', '=', 'product.id')
            ->where('product_id', $productId->value())
            ->get()->toArray();
    }

    /**
     * Calculate inventory next day
     * 
     * @param InventoryDate $date
     * @return array
     */
    public function calculateInventoryNextDay(InventoryDate $date): array
    {
        $result = [];
        $collection = DB::table('inventory')
            ->select(
                'inventory.warehouse_id',
                'inventory.product_id',
                'product.sku',
                'product.name',
                'inventory.qty',
                DB::raw('
                    (SELECT 
                    SUM(qty)
                    FROM order_item
                    INNER JOIN `order`
                    ON order_item.order_id = `order`.id
                    WHERE order_item.product_id = inventory.product_id
                    GROUP BY product_id, delivery_date) AS ordered_qty'
                )
            )
            ->join('product', 'inventory.product_id', '=', 'product.id')
            ->where('inventory_date', $date->value()->format('Y-m-d H:i:s'))
            ->get()->toArray();

        foreach ($collection as $key => $item) {
            $result[] = [
                'warehouse_id' => $item->warehouse_id,
                'product_id' => $item->product_id,
                'sku' => $item->sku,
                'name' => $item->name,
                'needed_qty' => (float)(($item->qty >= $item->ordered_qty) ? $item->ordered_qty : $item->qty)
            ];
        }

        return $result;
    }

    /**
     * Save model
     * 
     * @param InventoryEntity $inventoryEntity
     * @return void
     */
    public function save(InventoryEntity $inventoryEntity): void
    {
        $this->model->fill($inventoryEntity->toArray());
        $this->model->save();
    }
}