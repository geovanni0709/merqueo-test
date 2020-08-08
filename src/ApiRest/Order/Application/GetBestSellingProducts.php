<?php

declare(strict_types=1);

namespace Merqueo\ApiRest\Order\Application;

use Merqueo\ApiRest\Order\Domain\Contracts\OrderRepository;
use Merqueo\ApiRest\Order\Domain\OrderEntity;
use Merqueo\ApiRest\Order\Domain\OrderDate;

/**
 * class GetBestSellingProducts
 */
final class GetBestSellingProducts
{
    /**
     * @var OrderRepository
     */
    private $repository;

    /**
     * @param OrderRepository $repository
     */
    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get best selling products
     * 
     * @param string $date
     * @return array
     */
    public function execute(string $date): array
    {
        $response = $this->repository->getBestSellingProduct(new OrderDate($date));

        return $response;
    }
}