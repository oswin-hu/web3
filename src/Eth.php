<?php
/**
 * Author: oswin
 * Time: 2022/7/28-16:10
 * Description:
 * Version: v1.0
 */

namespace Web3;

final class Eth extends Web3Base
{

    protected array $allowedMethods = [
        'net_version',
        'net_peerCount',
        'net_listening'
    ];
}
