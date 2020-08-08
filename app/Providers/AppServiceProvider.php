<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ResponseInterface;
use App\Http\Response;
use Merqueo\ApiRest\Inventory\Domain\Contracts\InventoryRepository;
use Merqueo\ApiRest\Order\Domain\Contracts\OrderRepository;
use Merqueo\ApiRest\Delivery\Domain\Contracts\DeliveryRepository;
use Merqueo\ApiRest\Inventory\Infraestructure\Persistence\Eloquent\InventoryRepository as EloquentInventoryRepository;
use Merqueo\ApiRest\Order\Infraestructure\Persistence\Eloquent\OrderRepository as EloquentOrderRepository;
use Merqueo\ApiRest\Delivery\Infraestructure\Persistence\Eloquent\DeliveryRepository as EloquentDeliveryRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ResponseInterface::class,
            Response::class
        );

        $this->app->bind(
            InventoryRepository::class,
            EloquentInventoryRepository::class
        );

        $this->app->bind(
            OrderRepository::class,
            EloquentOrderRepository::class
        );

        $this->app->bind(
            DeliveryRepository::class,
            EloquentDeliveryRepository::class
        );
    }
}
