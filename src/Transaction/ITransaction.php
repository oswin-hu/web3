<?php
/**
 * Author: oswin
 * Time: 2022/8/9-13:48
 * Description:
 * Version: v1.0
 */

namespace Web3\Transaction;

interface ITransaction
{
    /**
     * getData
     *
     * @param  array  $trans
     * @return string
     */
    public function getData(array $trans): string;

    /**
     * RLPencode
     *
     * @param  array  $input
     * @return string
     */
    public function rawEncode(array $input): string;

    /**
     * sign
     *
     * @param  string  $priKey
     * @param  array  $data
     * @return string
     */
    public function sign(string $priKey, array $data): string;


}
