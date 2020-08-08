<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ResponseInterface;
use Merqueo\ApiRest\Inventory\Application\GetInventoryByProduct;
use Merqueo\ApiRest\Inventory\Domain\Contracts\InventoryRepository;

/**
 * class InventoryByProductController
 */
class InventoryByProductController extends Controller
{
    /**
     * @var GetInventoryByProduct
     */
    private $inventoryByProduct;

    /**
     * @var ResponseInterface
     */
    private $responseInterface;

    /**
     * Constructor
     * 
     * @param GetInventoryByProduct $inventoryByProduct
     * @return void
     */
    public function __construct(
        GetInventoryByProduct $inventoryByProduct,
        ResponseInterface $responseInterface
    ){
        $this->inventoryByProduct = $inventoryByProduct;
        $this->responseInterface = $responseInterface;
    }

    /**
     * Get inventory by product
     * 
     * @param Request $request
     * @return json string
     */
    public function getInventoryByProduct(Request $request)
    {
        try {
            $productId = (int)$request->productId;
            $inventory = $this->inventoryByProduct->execute($productId);
            
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