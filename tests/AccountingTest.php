<?php
/**
 * Created by PhpStorm.
 * User: joeychen
 * Date: 2018/11/7
 * Time: 上午 10:18
 */

namespace Tests;

use App\Accounting;
use PHPUnit\Framework\TestCase;

class AccountingTest extends TestCase
{
    public function test_no_budgets()
    {
        $accounting = new Accounting();
        $totalAmount = $accounting->totalAmount(new \DateTime('2010-04-01'), new \DateTime('2010-04-01'));
        $this->assertEquals(0, $totalAmount);
    }
}
