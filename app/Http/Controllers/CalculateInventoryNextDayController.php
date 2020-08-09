<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\ResponseInterface;
use Merqueo\ApiRest\Inventory\Application\CalculateInventoryNextDay;
use Merqueo\ApiRest\Inventory\Domain\Contracts\InventoryRepository;

/**
 * class CalculateInventoryNextDayController
 */
class CalculateInventoryNextDayController extends Controller
{
    /**
     * @var CalculateInventoryNextDay
     */
    private $inventoryNextDay;

    /**
     * @var ResponseInterface
     */
    private $responseInterface;

    /**
     * Constructor
     * 
     * @param CalculateInventoryNextDay $inventoryNextDay
     * @return void
     */
    public function __construct(
        CalculateInventoryNextDay $inventoryNextDay,
        ResponseInterface $responseInterface
    ){
        $this->inventoryNextDay = $inventoryNextDay;
        $this->responseInterface = $responseInterface;
    }

    /**
     * Calculate inventory next day
     * 
     * @param Request $request
     * @return json string
     */
    public function calculateInventoryNextDay(Request $request)
    {
        //try {
            $date = (string)$request->date;
            $inventoryNexyDay = $this->inventoryNextDay->execute($date);
            
            if (is_array($inventoryNexyDay) && count($inventoryNexyDay) == 0) {
                $response = $this->responseInterface
                    ->setCode(ResponseInterface::NO_CONTENT)
                    ->setMessage('No Content')
                    ->setData([]);
            } else {
                $response = $this->responseInterface
                    ->setCode(ResponseInterface::OK)
                    ->setMessage('OK')
                    ->setData($inventoryNexyDay);
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