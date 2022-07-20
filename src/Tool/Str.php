<?php

/**
 * Author: oswin
 * Time: 2022/7/20-13:03
 * Description:
 * Version: v1.0
 */

namespace Web3\Tool;

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
        return $haystack === '' || $needle === '' ||  mb_strpos($haystack, $needle) !== false;
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
        return  strncmp($haystack, $needle, strlen($needle)) === 0;
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
}
