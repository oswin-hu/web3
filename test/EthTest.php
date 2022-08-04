<?php
/**
 * Author: oswin
 * Time: 2022/7/21-14:38
 * Description:
 * Version: v1.0
 */

namespace Test;

use Web3\Eth;
use Web3\Net;

class EthTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        $this->eth = new Eth($this->testRinkebyHost);
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
}
