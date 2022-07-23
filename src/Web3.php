<?php
/**
 * Author: oswin
 * Time: 2022/7/22-13:20
 * Description:
 * Version: v1.0
 */

namespace Web3;

use Web3\Methods\Eth;
use Web3\Methods\Net;
use Web3\Providers\HttpProvider;
use Web3\Providers\Provider;
use Web3\Transporters\Rpc;

class Web3
{
    /**
     * @var Provider
     */
    protected Provider $provider;

    /**
     * @var Eth|null
     */
    public ?Eth $eth = null;

    /**
     * @var Net|null
     */
    public ?Net $net = null;

    /**
     * construct
     *
     * @param $provider
     */
    public function __construct($provider)
    {
        if (is_string($provider) && (filter_var($provider, FILTER_VALIDATE_URL)) && preg_match('/^https?:\/\//', $provider) === 1) {
            $manager        = new Rpc($provider);
            $this->provider = new HttpProvider($manager);
        } elseif ($provider instanceof Provider) {
            $this->provider = $provider;
        }
    }

    /**
     * getProvider
     *
     * @return Provider
     */
    public function getProvider(): Provider
    {
        return $this->provider;
    }

    /**
     * setProvider
     *
     * @param  Provider  $provider
     * @return void
     */
    public function setProvider(Provider $provider): void
    {
        $this->provider = $provider;
    }

    /**
     * getEth
     *
     * @return Eth|null
     */
    public function getEth(): ?Eth
    {
        if (is_null($this->eth)) {
            $this->eth = new Eth();
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
            $this->net = new Net();
        }

        return $this->net;
    }

    public function __call($name, $arguments)
    {
        $class = explode('\\', __CLASS__);
        echo $class;
        exit;
    }

    public function __get($name)
    {
        $method = 'get'.ucfirst($name);

        if (method_exists($this, $method)){
            return call_user_func_array([$this, $method], []);
        }
    }

    public function __isset($name)
    {

    }

    public function __set($name, $value)
    {
        $method = 'set'.ucfirst($name);
    }
}
