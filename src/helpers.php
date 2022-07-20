<?php

/**
 * Author: oswin
 * Time: 2022/7/20-18:54
 * Description:
 * Version: v1.0
 */

use Web3\Tool\Str;

if (!function_exists('str_contains')) {
    /**
     * 检查另一个字符串中是否包含一个字符串，返回布尔值
     *
     * @param  string  $haystack
     * @param  string  $needle
     * @return bool
     */
    function str_contains(string $haystack, string $needle): bool
    {
        return Str::str_contains($haystack, $needle);
    }
}

if (!function_exists('str_starts_with')) {
    /**
     * 检查一个字符串是否以另一个字符串开头,返回布尔值
     *
     * @param  string  $haystack
     * @param  string  $needle
     * @return bool
     */
    function str_starts_with(string $haystack, string $needle): bool
    {
        return Str::str_starts_with($haystack, $needle);
    }
}

if (!function_exists('str_ends_with')) {
    /**
     * 检查一个字符串是否以另一个字符串结尾,返回布尔值
     *
     * @param  string  $haystack
     * @param  string  $needle
     * @return bool
     */
    function str_ends_with(string $haystack, string $needle): bool
    {
        return Str::str_ends_with($haystack, $needle);
    }
}
