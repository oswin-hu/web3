<?php
/**
 * Author: oswin
 * Time: 2022/7/22-14:25
 * Description:
 * Version: v1.0
 */

namespace Web3\Providers;

use Web3\Methods\Method;

interface IProvider
{

    /**
     * 發送請求
     *
     * @param  Method  $method
     * @return mixed
     */
    public function send(Method $method);
}
