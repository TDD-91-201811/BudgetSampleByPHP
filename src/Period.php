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
     * @param Period $another
     * @return int
     */
    public function overlappingDays(Period $another): int
    {
        if ($this->isInvalid() || $this->hasNoOverlap($another)) {
            return 0;
        }

        $effectiveStart = $another->getStart() > $this->start
            ? $another->getStart()
            : $this->start;

        $effectiveEnd = $another->getEnd() < $this->end
            ? $another->getEnd()
            : $this->end;

        return $effectiveStart->diff($effectiveEnd)->d + 1;
    }

    /**
     * @return DateTime
     */
    private function getEnd(): DateTime
    {
        return $this->end;
    }

    /**
     * @return DateTime
     */
    private function getStart(): DateTime
    {
        return $this->start;
    }

    /**
     * @return bool
     */
    private function isInvalid(): bool
    {
        return $this->start > $this->end;
    }

    /**
     * @param Period $another
     * @return bool
     */
    private function hasNoOverlap(Period $another): bool
    {
        return $this->start > $another->getEnd() || $this->end < $another->getStart();
    }
}