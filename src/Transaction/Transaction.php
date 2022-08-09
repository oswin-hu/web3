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

    /**
     * @var string
     */
    protected string $privateKey = '';

    /**
     * __construct
     *
     * @param  string  $privateKey
     */
    public function __construct(string $privateKey)
    {
        $this->privateKey = $privateKey;
    }

    public function getAbiMethod(): string
    {
        return  '';
    }

    public function getData(array $trans): string
    {
        return  '';
    }

    public function sign(string $priKey, array $data): string
    {
        return '';
    }


    public function rawEncode(array $input): string
    {
        return '';
    }
}
