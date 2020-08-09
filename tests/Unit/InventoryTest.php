<?php

namespace Tests\Unit;

use Tests\TestCase;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Merqueo\ApiRest\Inventory\Application\GetInventoryByProduct;
use Merqueo\ApiRest\Inventory\Application\GetProductCanDelivery;
use Merqueo\ApiRest\Inventory\Application\GetProductsDeliveryByProvider;
use Merqueo\ApiRest\Inventory\Application\CalculateInventoryNextDay;
use Merqueo\ApiRest\Inventory\Infraestructure\Persistence\Eloquent\InventoryRepository;


/**
 * class InventoryTest
 */
class InventoryTest extends TestCase
{
    /**
     * Test GetInventoryByProduct
     *
     * @return void
     */
    public function testGetInventoryByProduct()
    {
        $inventoryByProduct = new GetInventoryByProduct(new InventoryRepository());
        $this->assertIsArray($inventoryByProduct->execute(1));
    }

    /**
     * Test GetProductCanDelivery
     *
     * @return void
     */
    public function testGetProductCanDelivery()
    {
        $productCanDelivery = new GetProductCanDelivery(new InventoryRepository());
        $this->assertIsArray($productCanDelivery->execute());
    }

    /**
     * Test GetProductsDeliveryByProvider
     *
     * @return void
     */
    public function testGetProductsDeliveryByProvider()
    {
        $productsDeliveryByProvider = new GetProductsDeliveryByProvider(new InventoryRepository());
        $this->assertIsArray($productsDeliveryByProvider->execute());
    }

    /**
     * Test CalculateInventoryNextDay
     *
     * @return void
     */
    public function testCalculateInventoryNextDay()
    {
        $calculateInventoryNextDay = new CalculateInventoryNextDay(new InventoryRepository());
        $this->assertIsArray($calculateInventoryNextDay->execute('2020-08-08'));
    }
}
