<?php
/**
 * Author: oswin
 * Time: 2022/7/22-13:20
 * Description:
 * Version: v1.0
 */

namespace Web3;

use RuntimeException;

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

    /**
     * @var Personal|null
     */
    protected ?Personal $personal = null;

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

    /**
     * getPersonal
     *
     * @return Personal|null
     */
    public function getPersonal(): ?Personal
    {
        if (is_null($this->personal)) {
            $this->personal = new Personal($this->provider);
        }

        return $this->personal;
    }

}
