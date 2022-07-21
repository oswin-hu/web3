<?php
/**
 * Author: oswin
 * Time: 2022/7/21-18:04
 * Description:
 * Version: v1.0
 */

namespace Web3\Tool;

use phpseclib3\Math\BigInteger;

final class Wei
{

    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }


    /**
     * Gets the Wei's value.
     */
    public function value(): string
    {
        return $this->value;
    }

    public function toWei(): string
    {
        return $this->value();
    }


    /**
     * Gets the Wei's string representation.
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->value();
    }

    /**
     * Gets the Wei's string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        $this->toString();
    }

    /**
     * Formats the current value by the given divider.
     *
     * @param  string  $value
     * @param  int  $divider
     * @return string
     */
    private static function div(string $value, int $divider): string
    {
        $scale = mb_strlen((string)$divider);
        $value = bcdiv($value, (string)$divider, $scale);
        return self::format($value);
    }

    /**
     * ormats the current value by the given multiplier.
     *
     * @param  string  $value
     * @param  int  $multiplier
     * @return string
     */
    private static function mul(string $value, int $multiplier): string
    {
        $bigInteger = (new BigInteger($value))->multiply(new BigInteger($multiplier));
        return self::format($bigInteger->toString());
    }

    /**
     * Formats the given string, removing trailing zeros.
     *
     * @param  string  $value
     * @return string
     */
    private static function format(string $value): string
    {
        if (str_contains($value, '.')) {
            $value = rtrim($value, '0');
        }
        return rtrim($value, '.');
    }
}
