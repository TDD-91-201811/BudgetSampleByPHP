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
    private $accounting;

    protected function setUp()
    {
        $this->accounting = new Accounting();
    }

    public function test_no_budgets()
    {
        $this->totalAmountShouldBe(0, new \DateTime('2010-04-01'), new \DateTime('2010-04-01'));
    }

    /**
     * @param $expected
     * @param $start
     * @param $end
     */
    private function totalAmountShouldBe($expected, $start, $end): void
    {
        $this->assertEquals($expected, $this->accounting->totalAmount($start, $end));
    }
}
