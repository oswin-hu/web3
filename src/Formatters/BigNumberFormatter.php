<?php
/**
 * Author: oswin
 * Time: 2022/8/3-14:59
 * Description:
 * Version: v1.0
 */

namespace Web3\Formatters;

use phpseclib3\Math\BigInteger;
use Web3\Tool\Utils;

class BigNumberFormatter implements IFormatter
{
    /**
     * @param $value
     * @return string
     */
    public static function format($value): string
    {
        return Utils::toBn((string)$value)->toString();
    }
}
