<?php
namespace App\Services\Pigeon;
use App\Models\Pigeon;
use App\Models\Order;

/**
 * Class OrderServices
 * @package App\Services\Pigeon
 */
class OrderServices implements OrderServiceInterface
{
    /**
     * @param Pigeon $pigeon
     * @param $routeInput
     * @return array
     */
    public function acceptOrder(Pigeon $pigeon, $routeInput)
    {
        $newOrder = [];
        $newOrder['pigeon_id'] = $pigeon->id;
        $newOrder['distance'] = $routeInput['distance'];
        $newOrder['deadline'] = $routeInput['deadline'];
        $newOrder['cost']     = $this->calculateCost($pigeon, $routeInput['distance']);
        $orderId = Order::insertGetId($newOrder);
        return $this->makeInvoiceReadable($orderId);
    }

    /**
     * @param $pigeon
     * @param $distance
     * @return mixed
     */
    private function calculateCost($pigeon, $distance)
    {
        return $pigeon->cost*$distance;
    }

    /**
     * @param $orderId
     * @return array
     */
    public function makeInvoiceReadable($orderId)
    {
        $order = Order::find($orderId);
        return [
            'invoice_id' => $order->id,
            'distance'   => $order->distance,
            'deadline'   => $order->deadline,
            'cost'       => $order->cost,
            'pigeon'     => $order->pigeon->name,
            'status'     => $order->status,
        ];
    }

}