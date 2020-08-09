<?php

namespace Tests\Unit;

use Tests\TestCase;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Merqueo\ApiRest\Delivery\Infraestructure\Persistence\Eloquent\DeliveryRepository;
use Merqueo\ApiRest\Delivery\Application\GetDeliveryByOrder;

/**
 * class DeliveryTest
 */
class DeliveryTest extends TestCase
{
    /**
     * Test GetDeliveryByOrder
     *
     * @return void
     */
    public function testGetDeliveryByOrder()
    {
        $deliveryByOrder = new GetDeliveryByOrder(new DeliveryRepository());
        $this->assertIsArray($deliveryByOrder->execute(1));
    }
}
