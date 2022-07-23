<?php

/**
 * Author: oswin
 * Time: 2022/7/19-18:03
 * Description:
 * Version: v1.0
 */
namespace Web3\Transporters;

interface IRpc
{
    public function request(string $method, array $params = []);
}
