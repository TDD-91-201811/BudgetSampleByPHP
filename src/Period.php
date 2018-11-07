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

        $effectiveStart = $this->start;
        if ($another->getStart() > $this->start) {
            $effectiveStart = $another->getStart();
        }

        $effectiveEnd = $this->end;
        if ($another->getEnd() < $this->end) {
            $effectiveEnd = $another->getEnd();
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

    /**
     * @return bool
     */
    public function isInvalid(): bool
    {
        return $this->start > $this->end;
    }

    /**
     * @param Period $another
     * @return bool
     */
    public function hasNoOverlap(Period $another): bool
    {
        return $this->start > $another->getEnd() || $this->end < $another->getStart();
    }
}