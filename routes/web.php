<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'rest/v1'], function ($productId) use ($router) {
    /** Get inventory by product */
    $router->get('inventory/product/{productId}', [
        'uses' => 'InventoryByProductController@getInventoryByProduct'
    ]);

    /** Get products can be delivery */
    $router->get('inventory-can-delivery', [
        'uses' => 'ProductsCanDeliveryController@getInventoryCanDelivery'
    ]);

    /** Get products has to be delivery by provider */
    $router->get('inventory-delivery-provider', [
        'uses' => 'ProductsDeliveryByProviderController@getProductsDeliveryByProvider'
    ]);

    /** Calculate inventory next day by date */
    $router->get('inventory/calculate-next-day/{date}', [
        'uses' => 'CalculateInventoryNextDayController@calculateInventoryNextDay'
    ]);

    /** Get best selling products */
    $router->get('best-selling-products/{orderDate}', [
        'uses' => 'BestSellingProductsController@getBestSellingProducts'
    ]);

    /** Get worst selling products */
    $router->get('worst-selling-products/{orderDate}', [
        'uses' => 'WorstSellingProductsController@getWorstSellingProducts'
    ]);

    /** Get delivery by order */
    $router->get('delivery/order/{orderId}', [
        'uses' => 'DeliveryByOrderController@getDeliveryByOrder'
    ]);
});

/*Route::any('{all}', function(){
    return 'API Agenda de Citas';
})->where('all', '.*');*/
