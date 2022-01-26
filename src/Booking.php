<?php

namespace Ood;

use Carbon\Carbon;

class Booking
{
    /**
     * @var array<int, array<string, Carbon>> Ood\Booking::$dates
     */
    private array $dates = [];

    public function book(string $begin, string $end): bool
    {
        $beginDate = new Carbon($begin);
        $beginDate->setTime(16, 00, 00);
        $endDate = new Carbon($end);
        $endDate->setTime(12, 00, 00);

        if (empty($this->dates)) {
            $this->dates = [['bookedBegin' => $beginDate, 'bookedEnd' => $endDate]];
            return true;
        }

        foreach ($this->dates as $period) {
            $bookedBegin = $period['bookedBegin'];
            $bookedEnd = $period['bookedEnd'];

            if ($beginDate < $bookedEnd && $endDate > $bookedBegin) {
                return false;
            }
            $this->dates[] = ['bookedBegin' => $beginDate, 'bookedEnd' => $endDate];
            return true;
        }
    }
}
