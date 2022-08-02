<?php

/**
 * Author: oswin
 * Time: 2022/7/20-13:03
 * Description:
 * Version: v1.0
 */

namespace Web3\Tool;

use Exception;
use kornrunner\Keccak;

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
}
