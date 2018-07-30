<?php
namespace App\Services\Pigeon;
use App\Models\Pigeon;


Interface OrderServiceInterface
{
  public function acceptOrder(Pigeon $pigeon, $routeInput);
}