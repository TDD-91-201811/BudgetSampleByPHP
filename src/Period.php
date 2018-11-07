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
    public function __construct(\DateTime $start, \DateTime $end)
    {
    }

    /**
     * @param DateTime $start
     * @param DateTime $end
     * @return int
     */
    public function days(DateTime $start, DateTime $end): int
    {
        return $start->diff($end)->d + 1;
    }
}