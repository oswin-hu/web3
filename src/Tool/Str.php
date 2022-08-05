<?php

/**
 * Author: oswin
 * Time: 2022/7/20-13:03
 * Description:
 * Version: v1.0
 */

namespace Web3\Tool;

use Exception;
use InvalidArgumentException;
use kornrunner\Keccak;
use phpseclib3\Math\BigInteger as BigNumber;

class Str
{

    /**
     * 检查另一个字符串中是否包含一个字符串，返回布尔值
     *
     * @param  string  $haystack
     * @param  string  $needle
     * @return bool
     */
    public static function str_contains(string $haystack, string $needle): bool
    {
        return $haystack === '' || $needle === '' || mb_strpos($haystack, $needle) !== false;
    }

    /**
     * 检查一个字符串是否以另一个字符串开头,返回布尔值
     *
     * @param  string  $haystack
     * @param  string  $needle
     * @return bool
     */
    public static function str_starts_with(string $haystack, string $needle): bool
    {
        return strncmp($haystack, $needle, strlen($needle)) === 0;
    }

    /**
     * 检查一个字符串是否以另一个字符串结尾,返回布尔值
     *
     * @param  string  $haystack
     * @param  string  $needle
     * @return bool
     */
    public static function str_ends_with(string $haystack, string $needle): bool
    {
        return $needle === '' || substr($haystack, -strlen($needle)) === $needle;
    }

    /**
     * 移除零叉前缀
     * @param  string  $value
     * @return string
     */
    public static function remove0x(string $value): string
    {
        return self::isZeroPrefixed($value) ? substr($value, 2) : $value;
    }

    /**
     * 添加零叉前缀
     * @param  string  $value
     * @return string
     */
    public static function add0x(string $value): string
    {
        return '0x'.self::remove0x($value);
    }

    /**
     * 是否零叉前缀
     * @param  string  $value
     * @return bool
     */
    public static function isZeroPrefixed(string $value): bool
    {
        return self::str_starts_with($value, '0x');
    }

    /**
     * 剥离零叉前缀
     *
     * @param  string  $value
     * @return string
     */
    public static function stripZero(string $value): string
    {
        return self::remove0x($value);
    }

    /**
     * 是否负数
     *
     * @param  string  $value
     * @return bool
     */
    public static function isNegative(string $value): bool
    {
        return self::str_starts_with($value, '-');
    }

    /**
     * hexTobin
     *
     * @param  string  $value
     * @return false|string
     */
    public static function hexToBin(string $value): string
    {
        if (self::isZeroPrefixed($value)) {
            $value = self::remove0x($value);
        }
        return pack('H*', $value);
    }

    /**
     * @param  string  $value
     * @return string|null
     * @throws Exception
     */
    public static function sha3(string $value): ?string
    {
        $hash = null;
        $hex  = self::isZeroPrefixed($value) ? self::hexToBin($value) : $value;

        if ($hex !== false) {
            $hash = Keccak::hash($hex, 256);
        }

        if (!is_null($hash)) {
            $hash = self::add0x($hash);
        }
        return $hash;

    }


    /**
     * @param $value
     * @param  bool  $isPrefix
     * @return string
     */
    public static function toHex($value, bool $isPrefix = false): string
    {
        if (is_int($value)) {
            $bn  = Utils::toBn($value);
            $hex = $bn->toHex(true);
            $hex = preg_replace('/^0+(?!$)/', '', $hex);
        } elseif (is_string($value)) {
            $value = self::stripZero($value);
            $hex   = implode('', unpack('H*', $value));
        } elseif ($value instanceof BigNumber) {
            $hex = $value->toHex(true);
            $hex = preg_replace('/^0+(?!$)/', '', $hex);
        } else {
            throw new InvalidArgumentException('The value to toHex function is not support.');
        }

        return $isPrefix ? self::add0x($hex) : $hex;
    }

    /**
     * 转为十六进制
     *
     * @param  string  $value
     * @param  bool  $mark
     * @return string
     */
    public static function decToHex(string $value, bool $mark = true): string
    {
        $hexArr = [
            '0',
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            'a',
            'b',
            'c',
            'd',
            'e',
            'f'
        ];
        $hexVal = '';
        while ($value !== 0) {
            $hexVal = $hexArr[bcmod($value, 16)].$hexVal;
            $value  = bcdiv($value, '16', 0);
        }

        return $mark ? self::add0x($hexVal) : $hexVal;
    }

    /**
     * 转为十进制
     *
     * @param  string  $value
     * @return string
     */
    public static function hexToDec(string $value): string
    {
        $value  = self::remove0x(strtolower($value));
        $decArr = [
            '0' => '0',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            'a' => '10',
            'b' => '11',
            'c' => '12',
            'd' => '13',
            'e' => '14',
            'f' => '15'
        ];
        $decVal = '0';
        $value  = strrev($value);
        $imax   = mb_strlen($value);
        for ($i = 0; $i < $imax; $i++) {
            $decVal = bcadd(bcmul(bcpow('16', $i, 0), $decArr[$value[$i]]), $decVal);
        }

        return $decVal;
    }

    /**
     * 字符串长度 ‘0’左补齐
     *
     * @param  string  $str
     * @param  int  $bit
     * @return string
     */
    public static function fillZero(string $str, int $bit = 64): string
    {
        $realStr = '';
        if ($str !== '') {
            $realStr = str_pad($str, $bit, 0, STR_PAD_LEFT);
        }

        return $realStr;
    }
}
