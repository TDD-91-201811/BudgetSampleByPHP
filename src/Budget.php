<?php
/**
 * Created by PhpStorm.
 * User: joeychen
 * Date: 2018/11/7
 * Time: 上午 10:46
 */

namespace App;

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
     * @return \DateTime
     */
    public function firstDay()
    {
        return new \DateTime($this->yearMonth . '01');
    }
}