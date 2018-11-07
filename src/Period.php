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
    public function days(): int
    {
        return $this->start->diff($this->end)->d + 1;
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