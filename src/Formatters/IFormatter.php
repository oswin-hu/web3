<?php
/**
 * Author: oswin
 * Time: 2022/7/30-18:31
 * Description:
 * Version: v1.0
 */

namespace Web3\Formatters;

interface IFormatter
{

    /**
     * format
     *
     * @param $value
     * @return mixed
     */
    public static function format($value);
}
