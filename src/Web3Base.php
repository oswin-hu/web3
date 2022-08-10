<?php
/**
 * Author: oswin
 * Time: 2022/7/28-16:15
 * Description:
 * Version: v1.0
 */

namespace Web3;

use JsonException;
use RuntimeException;
use Web3\Methods\Method;
use Web3\Providers\HttpProvider;
use Web3\Providers\Provider;
use Web3\Transporters\Http;

class Web3Base
{
    /**
     * @var Provider
     */
    protected Provider $provider;

    /**
     * @var string
     */
    protected string $privateKey = '';

    /**
     * @var array
     */
    protected array $allowedMethods = [];

    /**
     * __construct
     *
     * @param $provider
     */
    public function __construct($provider)
    {
        if (is_string($provider) && (filter_var($provider, FILTER_VALIDATE_URL)) && preg_match('/^https?:\/\//', $provider) === 1) {
            $http           = new Http($provider);
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
     * setPrivateKey
     *
     * @param  string  $privateKey
     * @return void
     */
    public function setPrivateKey(string $privateKey): void
    {
        $this->privateKey = $privateKey;
    }

    /**
     * getPrivateKey
     *
     * @return string
     */
    public function getPrivateKey(): string
    {
        return $this->privateKey;
    }

    /**
     * __call
     *
     * @param $name
     * @param $arguments
     * @return void
     * @throws JsonException
     */
    public function __call($name, $arguments)
    {
        if (empty($this->provider)) {
            throw new RuntimeException('Please set provider first.');
        }

        if (preg_match('/^(web3|personal|eth|net)_+[a-zA-Z\d]+$/', $name) === 1) {
            $method = $name;
            [$prefix, $name] = explode('_', $method);
        } else {
            $class  = explode('\\', static::class);
            $method = strtolower($class[1]).'_'.$name;
            $prefix = $class[1];
        }

        if (in_array($method, $this->allowedMethods, true) === false) {
            throw new RuntimeException('The method '.$method.' does not exist/is not available');
        }

        $className = sprintf("Web3\Methods\%s\%s", ucfirst($prefix), ucfirst($name));
        if (class_exists($className) === false) {
            $className = Method::class;
        }

        $classMethod = new $className($method, $arguments);
        $classMethod->setPrivateKey($this->privateKey);
        $inputs      = $classMethod->transform($arguments, $classMethod->getInputFormatters());
        $classMethod->setArguments($inputs);
        return $this->provider->send($classMethod);
    }

    /**
     * get
     *
     * @param  string  $name
     * @return mixed
     */
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
