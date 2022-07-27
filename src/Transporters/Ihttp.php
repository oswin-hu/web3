<?php

/**
 * Author: oswin
 * Time: 2022/7/19-18:03
 * Description:
 * Version: v1.0
 */
namespace Web3\Transporters;

interface Ihttp
{

    /**
     * request
     *
     * @param  string  $payload
     * @return mixed
     */
    public function request(string $payload);
}
