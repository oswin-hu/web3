<?php
/**
 * Author: oswin
 * Time: 2022/7/30-18:30
 * Description:
 * Version: v1.0
 */

namespace Web3\Formatters;

use Web3\Tool\Str;
use Web3\Tool\Utils;

class HexFormatter implements IFormatter
{

    public static function format($value)
    {
        $value = (string)$value;
        $value = mb_strtolower($value);

        if (Str::isZeroPrefixed($value) === false) {
            $value = Utils::toHex($value, true);
        }

        return $value;
    }
}
