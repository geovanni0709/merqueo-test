<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Delivery\Infraestructure\Persistence\Eloquent;

use Illuminate\Support\Facades\DB;
use Merqueo\ApiRest\Delivery\Domain\Contracts\DeliveryRepository as DeliveryRepositoryInterface;
use Merqueo\ApiRest\Delivery\Domain\DeliveryOrderId;

/**
 * class DeliveryRepository
 */
final class DeliveryRepository implements DeliveryRepositoryInterface
{
    /**
     * Get delivery by order
     * 
     * @param DeliveryOrderId $orderId
     * @return array
     */
    public function getDeliveryByOrderId(DeliveryOrderId $orderId): array
    {
        $result = [];
        $inventoryArray = [];
        $providerArray = [];

        $collection = DB::table('order_item')
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
                DB::raw('IF((order_item.qty-inventory.qty) >= 0, order_item.qty-inventory.qty, 0) as delivery_qty_provider')
            )
            ->Leftjoin('product', 'order_item.product_id', '=', 'product.id')
            ->Leftjoin('order', 'order_item.order_id', '=', 'order.id')
            ->Leftjoin('inventory', 'order_item.product_id', '=', 'inventory.product_id')
            ->Leftjoin('provider_product', 'product.id', '=', 'provider_product.product_id')
            ->Leftjoin('provider', 'provider_product.provider_id', '=', 'provider.id')
            ->orderBy('priority')
            ->where('order.id', $orderId->value())
            ->get()->toArray();
        
        foreach ($collection as $key => $item) {
            if ((float)$item->ordered_qty <= (float)$item->inventory_qty) {
                $inventoryArray[] = $item;
            } else {
                $providerArray[] = $item;
            }
        }

        $result['products_delivery_inventory'] = $inventoryArray;
        $result['products_delivery_provider'] = $providerArray;

        return $result;
    }
}