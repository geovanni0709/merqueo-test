<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Inventory\Application;

use Merqueo\ApiRest\Inventory\Domain\Contracts\InventoryRepository;
use Merqueo\ApiRest\Inventory\Domain\InventoryProductId;

/**
 * class GetProductsDeliveryByProvider
 */
final class GetProductsDeliveryByProvider
{
    /**
     * @var InventoryRepository
     */
    private $repository;

    /**
     * @param InventoryRepository $repository
     */
    public function __construct(InventoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get products can be delivery
     * 
     * @param int $productId
     * @return array
     */
    public function execute(): array
    {
        $response = $this->repository->getProductDeliveryProvider();

        return $response;
    }
}