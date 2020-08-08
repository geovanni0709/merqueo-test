<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ResponseInterface;
use Merqueo\ApiRest\Order\Application\GetBestSellingProducts;
use Merqueo\ApiRest\Order\Domain\Contracts\OrderRepository;

/**
 * class BestSellingProductsController
 */
class BestSellingProductsController extends Controller
{
    /**
     * @var GetBestSellingProducts
     */
    private $bestSelling;

    /**
     * @var ResponseInterface
     */
    private $responseInterface;

    /**
     * Constructor
     * 
     * @param GetBestSellingProducts $bestSelling
     * @return void
     */
    public function __construct(
        GetBestSellingProducts $bestSelling,
        ResponseInterface $responseInterface
    ){
        $this->bestSelling = $bestSelling;
        $this->responseInterface = $responseInterface;
    }

    /**
     * Get best selling products
     * 
     * @param Request $request
     * @return json string
     */
    public function getBestSellingProducts(Request $request)
    {
        try {
            $orderDate = (string)$request->orderDate;
            $inventory = $this->bestSelling->execute($orderDate);
            
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