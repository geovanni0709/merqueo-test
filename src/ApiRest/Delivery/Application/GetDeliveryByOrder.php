<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Delivery\Application;

use Merqueo\ApiRest\Delivery\Domain\Contracts\DeliveryRepository;
use Merqueo\ApiRest\Delivery\Domain\DeliveryEntity;
use Merqueo\ApiRest\Delivery\Domain\DeliveryOrderId;

/**
 * class GetDeliveryByOrder
 */
final class GetDeliveryByOrder
{
    /**
     * @var DeliveryRepository
     */
    private $repository;

    /**
     * @param DeliveryRepository $repository
     */
    public function __construct(DeliveryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get inventory by product
     * 
     * @param int $orderId
     * @return array
     */
    public function execute(int $orderId): array
    {
        $response = $this->repository->getDeliveryByOrderId(new DeliveryOrderId($orderId));
        
        return $response;
    }
}