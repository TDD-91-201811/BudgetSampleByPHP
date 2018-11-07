<?php
/**
 * Created by PhpStorm.
 * User: joeychen
 * Date: 2018/11/7
 * Time: 上午 10:19
 */

namespace App;

use DateTime;

class Accounting
{
    /**
     * @var IBudgetRepository
     */
    private $budgetRepository;

    public function __construct(IBudgetRepository $budgetRepository)
    {
        $this->budgetRepository = $budgetRepository;
    }

    public function totalAmount(DateTime $start, DateTime $end)
    {
        return 0;
    }
}