<?php

namespace Tests\Functional;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * class OrderTest
 */
class OrderTest extends TestCase
{
    /**
     * Test waiting for a response 200 
     *
     * @return void
     */
    public function testGetBestSelling()
    {
        $response = $this->call('GET', 'rest/v1/best-selling-products/2019-03-01');

        $this->assertEquals(200, $response->status());
    }

    /**
     * Test waiting for a response 200 
     *
     * @return void
     */
    public function testGetWorstSelling()
    {
        $response = $this->call('GET', 'rest/v1/worst-selling-products/2019-03-01');

        $this->assertEquals(200, $response->status());
    }
}
