<?php
namespace App\Services\Pigeon;
use App\Models\Pigeon;

/**
 * Class PigeonServices
 * @package App\Services\Pigeon
 */
class PigeonServices implements PigeonServiceInterface
{
    /**
     * @return string
     */
    public function receiveOrder()
    {
        return get_class();
    }

    /**
     * @param array $request
     * @return bool
     */
    public function isValid($request = [])
    {
        //Parameter validation
        if(!array_key_exists('distance', $request) ||
            !array_key_exists('deadline', $request)) {
            return false;
        }

        $deadline = \DateTime::createFromFormat('d/m/Y', $request['deadline']);
        if (!$deadline) {
            return false;
        }
        return true;
    }

    /**
     * @param $request
     * @return bool
     */
    public function getPigeon($request)
    {
        $pigeon =   $this->getAvailablePigeon($request);

        if($pigeon) {
            $pigeon->availability = '0';
            $pigeon->rest_count =  $pigeon->rest_count+1;
            $pigeon->save();
            return $pigeon;
        }

        return false;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function getAvailablePigeon($request)
    {
        //\DB::enableQueryLog();
       return  Pigeon::select(\DB::raw('`id`, `name`, `cost`, ((`range`/`speed`)*3600) as travelTime'))
            ->isAvailabile()
            ->isNotResting()
            ->isAbleToFlyUpTo($request['distance'])
            ->isAbleToDeliverOnTime($request['deadline'])
            ->first();

       // dd(\DB::getQueryLog());
    }



}