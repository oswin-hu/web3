<?php
/**
 * Author: oswin
 * Time: 2022/7/22-13:20
 * Description:
 * Version: v1.0
 */

namespace Web3;

use RuntimeException;
use Web3\Methods\Eth;
use Web3\Methods\Net;
use Web3\Providers\HttpProvider;
use Web3\Providers\Provider;
use Web3\Transporters\Http;

class Web3
{
    /**
     * @var Provider
     */
    protected Provider $provider;

    /**
     * @var Eth|null
     */
    protected ?Eth $eth = null;

    /**
     * @var Net|null
     */
    protected ?Net $net = null;

    /**
     * construct
     *
     * @param $provider
     */
    public function __construct($provider)
    {
        if (is_string($provider) && (filter_var($provider, FILTER_VALIDATE_URL)) && preg_match('/^https?:\/\//', $provider) === 1) {
            $http = new Http($provider);
            $this->provider = new HttpProvider($http);
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

    public function __call($name, $arguments)
    {
        if (preg_match('/^(eth|net)_+[a-zA-Z\d]+$/', $name) === 1) {
            [$class, $method] = explode('_', $name);
            $class = $this->get($class);
            if (method_exists($class, $method)){
                return $class->$method($arguments);
            }
            throw new RuntimeException('There is no '.$method.' method in the '.$class.' class');
        }
    }


    public function get(string $name)
    {
        $method = 'get'.ucfirst($name);

        if (method_exists($this, $method)) {
            return call_user_func_array([$this, $method], []);
        }

        throw new RuntimeException('The method does not exist');
    }

    /**
     * get
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->get($name);
    }

    /**
     * isset
     *
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        $method = 'get'.ucfirst($name);
        return method_exists($this, $method);
    }


    /**
     * set
     *
     * @param $name
     * @param $value
     * @return mixed
     */
    public function __set($name, $value)
    {
        $method = 'set'.ucfirst($name);

        if (method_exists($this, $method)) {
            return $this->$method($value);
        }

        throw new RuntimeException('The method does not exist');
    }
}
