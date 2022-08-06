<?php
/**
 * Author: oswin
 * Time: 2022/7/22-14:44
 * Description:
 * Version: v1.0
 */

namespace Test;

use Web3\Tool\Str;

class Web3Test extends TestCase
{


    public function testClientVersion(): void
    {
        $res = $this->web3->clientVersion();
        var_dump($res);
        $res = $this->web3->web3_clientVersion();
        var_dump($res);
        $this->assertTrue(true);
    }

    public function testSha3(): void
    {
        $res = $this->web3->sha3('hello world');
        var_dump($res);
        $res = $this->web3->web3_sha3('hello world');
        var_dump($res);
        $this->assertTrue(true);
    }

}


