<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ResponseInterface;
use Merqueo\ApiRest\Inventory\Application\GetProductsDeliveryByProvider;
use Merqueo\ApiRest\Inventory\Domain\Contracts\InventoryRepository;

/**
 * class ProductsDeliveryByProviderController
 */
class ProductsDeliveryByProviderController extends Controller
{
    /**
     * @var GetProductsDeliveryByProvider
     */
    private $canDelivery;

    /**
     * @var ResponseInterface
     */
    private $responseInterface;

    /**
     * Constructor
     * 
     * @param GetProductsDeliveryByProvider $canDelivery
     * @return void
     */
    public function __construct(
        GetProductsDeliveryByProvider $canDelivery,
        ResponseInterface $responseInterface
    ){
        $this->canDelivery = $canDelivery;
        $this->responseInterface = $responseInterface;
    }

    /**
     * Get product can be delivery
     * 
     * @param Request $request
     * @return json string
     */
    public function getProductsDeliveryByProvider(Request $request)
    {
        try {
            $inventory = $this->canDelivery->execute();
            
            if (is_array($inventory) && count($inventory) == 0) {
                $response = $this->responseInterface
                    ->setCode(ResponseInterface::NO_CONTENT)
                    ->setMessage('No Content')
                    ->setData([]);
            } else {
                $response = $this->responseInterface
                    ->setCode(ResponseInterface::OK)
                    ->setMessage('OK')
                    ->setData($inventory);
            }
        } catch(\Exception $e) {
            $response = $this->responseInterface
                ->setCode(ResponseInterface::ERROR)
                ->setMessage('Server Error')
                ->setData([]);
        }
        
        return response()->json($response->toArray());
    }
}