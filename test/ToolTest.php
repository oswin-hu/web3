<?php
/**
 * Author: oswin
 * Time: 2022/7/20-13:22
 * Description:
 * Version: v1.0
 */

namespace Test;

use Web3\Tool\Ecrecover;
use Web3\Tool\Str;
use Web3\Tool\Utils;
use Web3\Tool\Wei;

class ToolTest extends TestCase
{

    public function testStrContains(): void
    {
        var_dump(Str::str_contains("abc", "a")); //true
        var_dump(Str::str_contains("abc", "d")); //false
        var_dump(Str::str_contains("abc", "")); //true
        var_dump(Str::str_contains("", "")); //true
        $this->assertTrue(true);
    }

    public function testStrStartsWith(): void
    {
        $str = "beginningMiddleEnd";
        var_dump(Str::str_starts_with($str, "beg")); //true
        var_dump(Str::str_starts_with($str, "Beg")); //false
        var_dump(Str::str_starts_with("a", ""));//true
        var_dump(Str::str_starts_with("", ""));//true
        var_dump(Str::str_starts_with("", "a"));//false
        $this->assertTrue(true);
    }

    public function testStrEndsWith(): void
    {
        $str = "beginningMiddleEnd";
        var_dump(Str::str_ends_with($str, "End"));//true
        var_dump(Str::str_ends_with($str, "end"));//false
        var_dump(Str::str_ends_with("a", ""));//true
        var_dump(Str::str_ends_with("", ""));//true
        var_dump(Str::str_ends_with("", "a"));//false
        $this->assertTrue(true);
    }

    public function testRemove0x(): void
    {
        $signed = '0x7b87a3c4dd63bee43d4c880391bb0aaaf210c12356406152a30edc424b9c4de62cc64a266b6faf22691a36489651f1cbf7dee1f028ba24b7d48e5552eac4c93f1b';
        var_dump(Str::remove0x($signed));
        $this->assertTrue(true);
    }

    public function testAdd0x(): void
    {
        $signed = '0x7b87a3c4dd63bee43d4c880391bb0aaaf210c12356406152a30edc424b9c4de62cc64a266b6faf22691a36489651f1cbf7dee1f028ba24b7d48e5552eac4c93f1b';
        var_dump(Str::add0x($signed));
        $this->assertTrue(true);
    }

    public function testPersonalEcRecover(): void
    {
        $pubkey = '0x86d38a0879b51afcd79c85e589ba6572c482b344';
        $msg    = '0h01eh2unzm3ei4v';
        $signed = '0x5b3c6c934c15080bb91326e85925f47694a8beec0c23a862cf687fdde6a76a2d440b47d87d049939ef17ecac9d1cd4279bbee0aeabe310db21e033bce81ee2cc1b';
        var_dump(strcmp($pubkey, Ecrecover::personal_ecRecover($msg, $signed)) === 0);
        $this->assertTrue(true);
    }

    public function testEthEcRecover(): void
    {
        $pubkey = '0xEA7EC77Dfa845164D5B54080cFEe6B0d2EFbA3F9';
        $msg    = 'Hello World!';
        $signed = '0xa49d8d07693312a09cd92ebabdd2e066953f8e0899f1b6e95d849ceac7c0fb8006ca37f92305809df7f5033322b16977aa9963ffff2b3d73a1bc9965926e67ba1c';
        var_dump(strcmp(strtolower($pubkey), Ecrecover::eth_ecRecover($msg, $signed)) === 0);
        $this->assertTrue(true);
    }

    public function testIsZeroPrefixed(): void
    {
        $signed = '0x5b3c6c934c15080bb91326e85925f47694a8beec0c23a862cf687fdde6a76a2d440b47d87d049939ef17ecac9d1cd4279bbee0aeabe310db21e033bce81ee2cc1b';
        var_dump(Str::isZeroPrefixed($signed));
        $this->assertTrue(true);
    }

    public function testStripZero(): void
    {
        $signed = '0xa49d8d07693312a09cd92ebabdd2e066953f8e0899f1b6e95d849ceac7c0fb8006ca37f92305809df7f5033322b16977aa9963ffff2b3d73a1bc9965926e67ba1c';
        var_dump(Str::stripZero($signed));
        $this->assertTrue(true);
    }

    public function testToWei(): void
    {
//        var_dump(gmp_init('0x0de0b6b3a7640000'));
        $wei = Wei::fromEth('0x0de0b6b3a7640000');
        var_dump($wei->toEth());
        $this->assertTrue(true);
    }

}
