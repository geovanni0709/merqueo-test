<?php

namespace Merqueo\ApiRest\Order\Domain\Contracts;

use Merqueo\ApiRest\Order\Domain\OrderEntity;
use Merqueo\ApiRest\Order\Domain\OrderDate;

/**
 * interface OrderRepository
 */
interface OrderRepository
{
    /**
     * Contract getBestSellingProduct
     * 
     * @param OrderDate $orderDate
     * @return array
     */
    public function getBestSellingProduct(OrderDate $orderDate): array;

    /**
     * Contract getWorstSellingProduct
     * 
     * @param OrderDate $orderDate
     * @return array
     */
    public function getWorstSellingProduct(OrderDate $orderDate): array;

    /**
     * Contract save
     * 
     * @param OrderEntity $order
     * @return void
     */
    public function save(OrderEntity $order): void;
}