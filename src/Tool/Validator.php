<?php
/**
 * Author: oswin
 * Time: 2022/8/6-17:57
 * Description:
 * Version: v1.0
 */

namespace Web3\Tool;


class Validator
{

    /**
     * 地址验证
     * @param  string  $value
     * @return bool
     */
    public static function address(string $value): bool
    {
        return (preg_match('/^0x[a-fA-F0-9]{40}$/', $value) >= 1);
    }

    /**
     * 块哈希验证
     *
     * @param  string  $value
     * @return bool
     */
    public static function blockHash(string $value): bool
    {
        return (preg_match('/^0x[a-fA-F0-9]{64}$/', $value) >= 1);
    }

    /**
     * 数量验证
     * @param  string  $value
     * @return bool
     */
    public static function quantity(string $value): bool
    {
        return is_numeric($value) || preg_match('/^0x[a-fA-F0-9]*$/', $value) >= 1;
    }

    /**
     * 标签验证
     * @param  string  $value
     * @return bool
     */
    public static function tag(string $value): bool
    {
        return in_array($value, ['latest', 'earliest', 'pending'], true);
    }

    /**
     * 随机数验证
     *
     * @param  string  $value
     * @return bool
     */
    public static function nonce(string $value): bool
    {
        return (preg_match('/^0x[a-fA-F0-9]{16}$/', $value) >= 1);
    }
}
