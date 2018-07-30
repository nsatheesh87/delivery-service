<?php

namespace App\Models\Traits\Scope;

/**
 * Class UserScope.
 */
trait PigeonScope
{

    /**
     * @param $query
     * @param string $status
     * @return mixed
     */
    public function scopeIsAvailabile($query, $status = '1')
    {
        return $query->where('availability', $status);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsNotResting($query)
    {
        return $query->whereRaw('rest_count < downtime');
    }

    /**
     * @param $query
     * @param $distance
     * @return mixed
     */
    public function scopeIsAbleToFlyUpTo($query, $distance)
    {
        return $query->where('range', '>=', $distance);
    }

    /**
     * @param $query
     * @param $deadLine
     */
    public function scopeIsAbleToDeliverOnTime($query, $deadLine)
    {
        $query->havingRaw('travelTime <= ?', [$this->howLongShouldItTake($deadLine)]);
    }

    /**
     * Count time differences between current time and deadline time
     *
     * @return float
     */
    private function howLongShouldItTake($deadLine)
    {
        // Let's count how many seconds do we need from current time to the deadline
        $currentTime        = new \DateTime();
        $currentTimeStamp   = $currentTime->getTimestamp();
        $deadlineDateTime   = \DateTime::createFromFormat('d/m/Y', $deadLine)->getTimestamp();
        return $deadlineDateTime - $currentTimeStamp;
    }


}
