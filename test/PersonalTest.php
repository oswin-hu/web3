<?php
/**
 * Author: oswin
 * Time: 2022/8/3-17:15
 * Description:
 * Version: v1.0
 */

namespace Test;

class PersonalTest extends TestCase
{

    public function testNewAccount(): string
    {
        $res = $this->web3->personal->newAccount('');
        var_dump($res);
        $this->assertTrue(true);
    }


    public function testListAccounts(): string
    {
        $res = $this->web3->personal->listAccounts();
        var_dump($res);
        $this->assertTrue(true);
    }

    public function testSign(): void
    {
        $res = $this->web3->personal->sign('hello', '0x45AAbd31fEE33cae454C5Dc5d94b721F8EEAb74E', '');
        var_dump($res);
        $this->assertTrue(true);
    }
}
