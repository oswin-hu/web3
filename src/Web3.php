<?php
/**
 * Author: oswin
 * Time: 2022/7/22-13:20
 * Description:
 * Version: v1.0
 */

namespace Web3;

class Web3 extends Web3Base
{

    /**
     * @var Eth|null
     */
    protected ?Eth $eth = null;

    /**
     * @var Net|null
     */
    protected ?Net $net = null;


    protected array $allowedMethods = [
        'web3_clientVersion',
        'web3_sha3'
    ];

    /**
     * getEth
     *
     * @return Eth|null
     */
    public function getEth(): ?Eth
    {
        if (is_null($this->eth)) {
            $this->eth = new Eth($this->provider);
        }
        return $this->eth;
    }

    /**
     * getNet
     *
     * @return Net|null
     */
    public function getNet(): ?Net
    {
        if (is_null($this->net)) {
            $this->net = new Net($this->provider);
        }

        return $this->net;
    }


}
