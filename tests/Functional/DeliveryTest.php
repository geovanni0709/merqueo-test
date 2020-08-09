<?php

namespace Tests\Functional;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * class DeliveryTest
 */
class DeliveryTest extends TestCase
{
    /**
     * Test waiting for a response 200 
     *
     * @return void
     */
    public function testDeliveryByOrder()
    {
        $response = $this->call('GET', 'rest/v1/delivery/order/1');

        $this->assertEquals(200, $response->status());
    }
}
