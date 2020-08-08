<?php

namespace Tests\Unit;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

/**
 * class InventoryTest
 */
class InventoryTest extends TestCase
{
    /**
     * Test waiting for a response 200 
     *
     * @return void
     */
    public function testInventoryByProduct()
    {
        $response = $this->call('GET', 'rest/v1/inventory/product/1');

        $this->assertEquals(200, $response->status());
    }

    /**
     * Test waiting for a response 200 
     *
     * @return void
     */
    public function testInventoryCanDelivery()
    {
        $response = $this->call('GET', 'rest/v1/inventory-can-delivery');

        $this->assertEquals(200, $response->status());
    }

    /**
     * Test waiting for a response 200 
     *
     * @return void
     */
    public function testInventoryDeliveryByProvider()
    {
        $response = $this->call('GET', 'rest/v1/inventory-delivery-provider');

        $this->assertEquals(200, $response->status());
    }
}
