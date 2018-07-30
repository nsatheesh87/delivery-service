<?php

namespace App\Http\Controllers;
use App\Services\Pigeon\PigeonServices;
use App\Services\Pigeon\OrderServices;
use Illuminate\Http\Request;

/**
 * Class PigeonController
 * @package App\Http\Controllers
 */
class PigeonController extends Controller
{
    /**
     * @var PigeonServices
     */
    protected $pigeonService;

    /**
     * @var OrderServices
     */
    protected $orderService;

    /**
     * PigeonController constructor.
     */
    public function __construct()
    {
        $this->pigeonService = new PigeonServices();
        $this->orderService = new OrderServices();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOrder(Request $request)
    {
        $routeInput  = $request->json()->all();
        if ($this->pigeonService->isValid($routeInput)) {
            $pigeon = $this->pigeonService->getPigeon($routeInput);

            if (!$pigeon) {
                return response()->json(['data' => 'Pigeon is not available'], 200);
            } else {
                $acceptedOrder = $this->orderService->acceptOrder($pigeon, $routeInput);
                return response()->json(['data' =>$acceptedOrder], 200);
            }

        }
         return response()->json(['error' => 'Invalid Parameter'], 400);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function setOrderStatus(Request $request)
    {
        return $this->orderService->setOrderStatus($request->json()->all());
    }
}
