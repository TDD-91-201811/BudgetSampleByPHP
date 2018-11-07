<?php
/**
 * Created by PhpStorm.
 * User: joeychen
 * Date: 2018/11/7
 * Time: 上午 10:18
 */

namespace Tests;

use App\Budget;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\StubBudgetRepository;
use App\Accounting;
use App\IBudgetRepository;
use PHPUnit\Framework\TestCase;
use Mockery as m;

class AccountingTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /**
     * @var Accounting
     */
    private $accounting;
    /**
     * @var IBudgetRepository
     */
    private $stubRepository;

    protected function setUp()
    {
        $this->stubRepository = m::spy(IBudgetRepository::class);
        $this->accounting = new Accounting($this->stubRepository);
    }

    public function test_no_budgets()
    {
        $this->totalAmountShouldBe(0, new \DateTime('2010-04-01'), new \DateTime('2010-04-01'));
    }

    public function test_period_inside_budget_month()
    {
        $this->givenBudgets(array(new Budget('201004', 30)));
        $this->totalAmountShouldBe(1, new \DateTime('2010-04-01'), new \DateTime('2010-04-01'));
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

    /**
     * @param $budgets
     */
    private function givenBudgets($budgets): void
    {
        $this->stubRepository->shouldReceive('getAll')->andReturn($budgets);
    }
}
