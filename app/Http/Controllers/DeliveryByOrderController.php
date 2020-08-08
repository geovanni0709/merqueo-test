<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ResponseInterface;
use Merqueo\ApiRest\Delivery\Application\GetDeliveryByOrder;
use Merqueo\ApiRest\Delivery\Domain\Contracts\DeliveryRepository;

/**
 * class DeliveryByOrderController
 */
class DeliveryByOrderController extends Controller
{
    /**
     * @var GetDeliveryByOrder
     */
    private $deliveryByOrder;

    /**
     * @var ResponseInterface
     */
    private $responseInterface;

    /**
     * Constructor
     * 
     * @param GetDeliveryByOrder $deliveryByOrder
     * @return void
     */
    public function __construct(
        GetDeliveryByOrder $deliveryByOrder,
        ResponseInterface $responseInterface
    ){
        $this->deliveryByOrder = $deliveryByOrder;
        $this->responseInterface = $responseInterface;
    }

    /**
     * Get inventory by product
     * 
     * @param Request $request
     * @return json string
     */
    public function getDeliveryByOrder(Request $request)
    {
        //try {
            $orderId = (int)$request->orderId;
            $order = $this->deliveryByOrder->execute($orderId);
            
            if (is_array($order) && count($order) == 0) {
                $response = $this->responseInterface
                    ->setCode(ResponseInterface::NO_CONTENT)
                    ->setMessage('No Content')
                    ->setData([]);
            } else {
                $response = $this->responseInterface
                    ->setCode(ResponseInterface::OK)
                    ->setMessage('OK')
                    ->setData($order);
            }
        /*} catch(\Exception $e) {
            $response = $this->responseInterface
                ->setCode(ResponseInterface::ERROR)
                ->setMessage('Server Error')
                ->setData([]);
        }*/
        
        return response()->json($response->toArray());
    }
}