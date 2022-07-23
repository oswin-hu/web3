<?php

/**
 * Author: oswin
 * Time: 2022/7/20-13:20
 * Description:
 * Version: v1.0
 */

namespace Test;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Web3\Web3;

class TestCase extends BaseTestCase
{

    /**
     * @var Web3
     */
    protected Web3 $web3;

    /**
     * @var string
     */
    protected string $testRinkebyHost = 'https://rinkeby.infura.io/v3/5333118b1a98445e9d84049202f38bc3';

    /**
     * @var string
     */
    protected string $testHost = '';

    /**
     * @var string
     */
    protected string $coinbase;

    public function setUp():void
    {
        $this->web3 = new Web3($this->testRinkebyHost);
        $this->coinbase = $this->web3->eth->coinbase();
    }


}

