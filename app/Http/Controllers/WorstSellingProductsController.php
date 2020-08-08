<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ResponseInterface;
use Merqueo\ApiRest\Order\Application\GetWorstSellingProducts;
use Merqueo\ApiRest\Order\Domain\Contracts\OrderRepository;

/**
 * class WorstSellingProductsController
 */
class WorstSellingProductsController extends Controller
{
    /**
     * @var GetWorstSellingProducts
     */
    private $worstSelling;

    /**
     * @var ResponseInterface
     */
    private $responseInterface;

    /**
     * Constructor
     * 
     * @param GetWorstSellingProducts $worstSelling
     * @return void
     */
    public function __construct(
        GetWorstSellingProducts $worstSelling,
        ResponseInterface $responseInterface
    ){
        $this->worstSelling = $worstSelling;
        $this->responseInterface = $responseInterface;
    }

    /**
     * Get worst selling products
     * 
     * @param Request $request
     * @return json string
     */
    public function getWorstSellingProducts(Request $request)
    {
        try {
            $orderDate = (string)$request->orderDate;
            $inventory = $this->worstSelling->execute($orderDate);
            
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