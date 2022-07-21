<?php
/**
 * Author: oswin
 * Time: 2022/7/19-18:19
 * Description:
 * Version: v1.0
 */

namespace Web3\Transporters;

class Rpc extends Manager implements IHttpManager
{

    public function request(string $method, array $params = [])
    {
        $options = $this->options($params);
    }
}
