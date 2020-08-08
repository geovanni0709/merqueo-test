<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Inventory\Application;

use Merqueo\ApiRest\Inventory\Domain\Contracts\InventoryRepository;
use Merqueo\ApiRest\Inventory\Domain\InventoryEntity;
use Merqueo\ApiRest\Inventory\Domain\InventoryProductId;

/**
 * class GetInventoryByProduct
 */
final class GetInventoryByProduct
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
     * Get inventory by product
     * 
     * @param int $productId
     * @return array
     */
    public function execute(int $productId): array
    {
        $response = $this->repository->getInventoryByProductId(new InventoryProductId($productId));
        
        return $response;
    }
}