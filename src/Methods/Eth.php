<?php
/**
 * Author: oswin
 * Time: 2022/7/21-13:23
 * Description:
 * Version: v1.0
 */

namespace Web3\Methods;

final class Eth extends Method
{


    public function coinbase(): string
    {
        print_r($this->request(__FUNCTION__));
        return __FUNCTION__;
    }

    public function __call($name, $arguments)
    {
       return 'call'.$name;
    }
}
