<?php
/**
 * Author: oswin
 * Time: 2022/7/23-18:28
 * Description:
 * Version: v1.0
 */

namespace Web3\Methods;

use Web3\Providers\Provider;
use Web3\Transporters\Manager;

class Method
{
    /**
     * @var Manager
     */
    protected Manager $transporter;

    /**
     * @var Provider
     */
    protected Provider $provider;

    public function __construct(Provider $provider)
    {
        $this->transporter = $provider->getManager();
    }

    /**
     * @param $method
     * @param  array  $params
     * @return mixed
     */
    final public function send($method, array $params= []){
        return $this->transporter->request($method, $params);
    }
}
