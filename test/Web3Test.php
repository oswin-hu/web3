<?php
/**
 * Author: oswin
 * Time: 2022/7/22-14:44
 * Description:
 * Version: v1.0
 */

namespace Test;

use Web3\Transporters\Rpc;
use Web3\Web3;

class Web3Test extends TestCase
{
    public function testWeb3(): void
    {
        var_dump($this->web3);
        $this->assertTrue(true);
    }
}
