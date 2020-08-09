<?php

namespace Tests\Unit;

use Tests\TestCase;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Merqueo\ApiRest\Order\Application\GetBestSellingProducts;
use Merqueo\ApiRest\Order\Application\GetWorstSellingProducts;
use Merqueo\ApiRest\Order\Infraestructure\Persistence\Eloquent\OrderRepository;

/**
 * class OrderTest
 */
class OrderTest extends TestCase
{
    /**
     * Test GetBestSellingProducts
     *
     * @return void
     */
    public function testGetBestSellingProducts()
    {
        $bestSellingProducts = new GetBestSellingProducts(new OrderRepository());
        $this->assertIsArray($bestSellingProducts->execute('2020-08-08'));
    }

    /**
     * Test GetWorstSellingProducts
     *
     * @return void
     */
    public function testGetWorstSellingProducts()
    {
        $worstSellingProducts = new GetWorstSellingProducts(new OrderRepository());
        $this->assertIsArray($worstSellingProducts->execute('2020-08-08'));
    }
}
