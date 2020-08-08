<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Order\Infraestructure\Persistence\Eloquent;

use Illuminate\Support\Facades\DB;
use Merqueo\ApiRest\Order\Domain\Contracts\OrderRepository as OrderRepositoryInterface;
use Merqueo\ApiRest\Order\Domain\OrderEntity;
use Merqueo\ApiRest\Order\Domain\OrderDate;

/**
 * class OrderRepository
 */
final class OrderRepository implements OrderRepositoryInterface
{
    /**
     * Get best selling products
     *
     * @param OrderDate $orderDate
     */
    public function getBestSellingProduct(OrderDate $orderDate): array
    {
        return DB::table('order_item')
            ->select(
                DB::raw('SUM(order_item.qty) as total_qty'),
                'product.sku',
                'product.name'
            )
            ->join('order', 'order_item.order_id', '=', 'order.id')
            ->join('product', 'order_item.product_id', '=', 'product.id')
            ->where('delivery_date', $orderDate->value())
            ->groupBy('order_item.product_id')
            ->orderByRaw('SUM(order_item.qty) DESC')
            ->get()->toArray();
    }

    /**
     * Get worst selling products
     *
     * @param OrderDate $orderDate
     */
    public function getWorstSellingProduct(OrderDate $orderDate): array
    {
        return DB::table('product')
            ->select(
                DB::raw('SUM(order_item.qty) as total_qty'),
                'product.sku',
                'product.name'
            )
            ->LeftJoin('order_item', 'product.id', '=', 'order_item.product_id')
            ->LeftJoin('order', 'order_item.order_id', '=', 'order.id')
            ->where('delivery_date', $orderDate->value())
            ->groupBy('product.id')
            ->orderByRaw('SUM(order_item.qty) ASC')
            ->get()->toArray();
    }

    /**
     * Save model
     * 
     * @param OrderEntity $orderEntity
     * @return void
     */
    public function save(OrderEntity $orderEntity): void
    {
        $this->model->fill($orderEntity->toArray());
        $this->model->save();
    }
}