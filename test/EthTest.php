<?php
/**
 * Author: oswin
 * Time: 2022/7/21-14:38
 * Description:
 * Version: v1.0
 */

namespace Test;

use kornrunner\Keccak;
use Web3\Eth;
use Web3\Net;
use Web3\Tool\Utils;

class EthTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        $this->eth = new Eth($this->testHost);
    }

    public function testAccount(): void
    {
        $res = $this->web3->eth->accounts();
        var_dump($res);
        $res = $this->web3->eth->eth_accounts();
        var_dump($res);
        $res = $this->web3->getEth()->accounts();
        var_dump($res);
        $res = $this->web3->getEth()->eth_accounts();
        var_dump($res);
        $res = $this->eth->accounts();
        var_dump($res);
        $res = $this->eth->eth_accounts();
        var_dump($res);
        $this->assertTrue(true);
    }

    public function testBlockNumber(): void
    {
        $res = $this->web3->eth->blockNumber();
        var_dump($res);
        $res = $this->web3->eth->eth_blockNumber();
        var_dump($res);
        $res = $this->web3->getEth()->blockNumber();
        var_dump($res);
        $res = $this->web3->getEth()->eth_blockNumber();
        var_dump($res);
        $res = $this->eth->blockNumber();
        var_dump($res);
        $res = $this->eth->eth_blockNumber();
        var_dump($res);
        $this->assertTrue(true);
    }

    public function testCall(): void
    {

        var_dump(gmp_init('0x9184e72a000'));
        $hash = Keccak::hash("eth_call",256);
        $hash_sub = mb_substr($hash,0,8,'utf-8');
        var_dump($hash_sub);

        '{
    "jsonrpc":"2.0",
    "method":"eth_call",
    "params":[
        {
            "from":"0xb60e8dd61c5d32be8058bb8eb970870f07233155",
            "to":"0xd46e8dd67c5d32be8058bb8eb970870f07244567",
            "gas":"0x76c0",
            "gasPrice":"0x9184e72a000",
            "value":"0x9184e72a",
            "data":"0xd46e8dd67c5d32be8d46e8dd67c5d32be8058bb8eb970870f072445675058bb8eb970870f072445675"
        },
        "latest"
    ],
    "id":1
}';
        //TODO 帶處理
        $this->assertTrue(true);
    }


    public function testChainId(): void
    {
        $res = $this->web3->eth->chainId();
        var_dump($res);
        $res = $this->web3->eth->eth_chainId();
        var_dump($res);
        $res = $this->web3->getEth()->chainId();
        var_dump($res);
        $res = $this->web3->getEth()->eth_chainId();
        var_dump($res);
        $res = $this->eth->chainId();
        var_dump($res);
        $res = $this->eth->eth_chainId();
        var_dump($res);
        $this->assertTrue(true);
    }

    public function testCoinbase(): void
    {
        $res = $this->eth->coinbase();
        var_dump($res);
    }


}
