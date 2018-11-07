<?php
/**
 * Created by PhpStorm.
 * User: joeychen
 * Date: 2018/11/7
 * Time: 上午 10:46
 */

namespace App;

use DateTime;

class Budget
{
    /**
     * @var string
     */
    private $yearMonth;
    /**
     * @var int
     */
    private $amount;

    public function __construct(string $yearMonth, int $amount)
    {
        $this->yearMonth = $yearMonth;
        $this->amount = $amount;
    }

    /**
     * @param $period
     * @return float|int
     */
    public function overlappingAmount($period)
    {
        return $this->dailyAmount() * $period->overlappingDays($this->createPeriod());
    }

    /**
     * @return float|int
     */
    private function dailyAmount()
    {
        return $this->getAmount() / $this->days();
    }

    /**
     * @return Period
     */
    private function CreatePeriod(): Period
    {
        return new Period($this->firstDay(), $this->lastDay());
    }

    /**
     * @return int
     */
    private function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return DateTime
     */
    private function firstDay()
    {
        return new DateTime($this->yearMonth . '01');
    }

    private function lastDay()
    {
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->firstDay()->format('m'), $this->firstDay()->format('y'));

        return new DateTime($this->yearMonth . $daysInMonth);
    }

    private function days()
    {
        return $this->lastDay()->format('d');
    }
}