<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Inventory\Application;

use Merqueo\ApiRest\Inventory\Domain\Contracts\InventoryRepository;
use Merqueo\ApiRest\Inventory\Domain\InventoryDate;

/**
 * class CalculateInventoryNextDay
 */
final class CalculateInventoryNextDay
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
     * @param int $date
     * @return array
     */
    public function execute(string $date): array
    {
        $response = $this->repository->calculateInventoryNextDay(new InventoryDate($date));
        
        return $response;
    }
}