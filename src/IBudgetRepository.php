<?php
/**
 * Created by PhpStorm.
 * User: joeychen
 * Date: 2018/11/7
 * Time: 上午 10:33
 */

namespace App;

interface IBudgetRepository
{
    /**
     * @return mixed
     */
    public function getAll();
}