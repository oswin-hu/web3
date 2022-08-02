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
     * Creates a new Wei instance, from the given eth value.
     *
     * @param  string  $eth
     * @return static
     */
    public static function fromEth(string $eth): self
    {
        $value = self::mul($eth);
        return new self($value);
    }


    /**
     * Gets the Wei's value.
     */
    public function value(): string
    {
        return $this->value;
    }

    /**
     * Gets Wei's value.
     *
     * @return string
     */
    public function toWei(): string
    {
        return $this->value();
    }

    /**
     * Gets Wei's Kwei value.
     *
     * @return string
     */
    public function toKwei(): string
    {
        return self::div($this->value, 1000);
    }

    /**
     * Gets Wei's Mwei value.
     *
     * @return string
     */
    public function toMwei(): string
    {
        return self::div($this->value, 1000000);
    }


    /**
     * Gets Wei's Gwen value.
     *
     * @return string
     */
    public function toGwei(): string
    {
        return self::div($this->value, 1000000000);
    }

    /**
     * Gets the  tWei's ther value.
     *
     * @return string
     */
    public function toMicroether(): string
    {
        return self::div($this->value, 1000000000000);
    }

    /**
     * Gets the  tWei's ther value.
     *
     * @return string
     */
    public function toMilliether(): string
    {
        return self::div($this->value, 1000000000000000);
    }

    /**
     * Gets tWei's ether value.
     *
     * @return string
     */
    public function toEther(): string
    {
        return self::div($this->value, 1000000000000000000);
    }

    /**
     * Gets Wei's Eth value.
     *
     * @return string
     */
    public function toEth(): string
    {
        return $this->toEther();
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
        return $this->toString();
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
     * Formats  the current value by the given multiplier.
     *
     * @param  string  $value
     * @return string
     */
    private static function mul(string $value): string
    {
        $bigInteger = (new BigInteger($value))->multiply(new BigInteger(1000000000000000000));

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
