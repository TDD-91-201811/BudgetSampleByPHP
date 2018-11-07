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
     * @return float|int
     */
    public function dailyAmount()
    {
        return $this->getAmount() / $this->days();
    }

    /**
     * @return Period
     */
    public function CreatePeriod(): Period
    {
        return new Period($this->firstDay(), $this->lastDay());
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getYearMonth(): string
    {
        return $this->yearMonth;
    }

    /**
     * @return DateTime
     */
    public function firstDay()
    {
        return new DateTime($this->yearMonth . '01');
    }

    public function lastDay()
    {
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->firstDay()->format('m'), $this->firstDay()->format('y'));

        return new DateTime($this->yearMonth . $daysInMonth);
    }

    public function days()
    {
        return $this->lastDay()->format('d');
    }
}