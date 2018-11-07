<?php
/**
 * Created by PhpStorm.
 * User: joeychen
 * Date: 2018/11/7
 * Time: 上午 11:22
 */

namespace App;

use DateTime;

class Period
{
    /**
     * @var DateTime
     */
    private $start;
    /**
     * @var DateTime
     */
    private $end;

    public function __construct(\DateTime $start, \DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return int
     */

    /**
     * @param $budget
     * @return int
     */
    public function overlappingDays(Budget $budget): int
    {
        if ($this->start > $budget->lastDay()) {
            return 0;
        }
        if ($this->end < $budget->firstDay()) {
            return 0;
        }

        $effectiveStart = $this->start;
        if ($budget->firstDay() > $this->start) {
            $effectiveStart = $budget->firstDay();
        }

        $effectiveEnd = $this->end;
        if ($budget->lastDay() < $this->end) {
            $effectiveEnd = $budget->lastDay();
        }

        return $effectiveStart->diff($effectiveEnd)->d + 1;
    }

    /**
     * @return DateTime
     */
    public function getEnd(): DateTime
    {
        return $this->end;
    }

    /**
     * @return DateTime
     */
    public function getStart(): DateTime
    {
        return $this->start;
    }
}