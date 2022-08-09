<?php
/**
 * Author: oswin
 * Time: 2022/8/9-13:47
 * Description:
 * Version: v1.0
 */

namespace Web3\Transaction;

class Transaction implements ITransaction
{
    public function getData(array $trans): string
    {
        // TODO: Implement getData() method.
    }

    public function sign(string $priKey, array $data): string
    {
        // TODO: Implement sign() method.
    }


    public function rawEncode(array $input): string
    {
        // TODO: Implement rawEncode() method.
    }
}
