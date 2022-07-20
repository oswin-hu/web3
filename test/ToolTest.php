<?php
/**
 * Author: oswin
 * Time: 2022/7/20-13:22
 * Description:
 * Version: v1.0
 */

namespace Test;

use Web3\Tool\Str;

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

}
