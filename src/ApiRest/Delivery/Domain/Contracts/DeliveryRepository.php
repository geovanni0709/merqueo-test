<?php

namespace Merqueo\ApiRest\Delivery\Domain\Contracts;

use Merqueo\ApiRest\Delivery\Domain\DeliveryOrderId;

/**
 * interface DeliveryRepository
 */
interface DeliveryRepository
{
    /**
     * Contract getDeliveryByOrderId
     * 
     * @param DeliveryOrderId $orderId
     * @return array
     */
    public function getDeliveryByOrderId(DeliveryOrderId $orderId): array;
}