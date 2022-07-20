<?php
/**
 * Author: oswin
 * Time: 2022/7/19-18:06
 * Description:
 * Version: v1.0
 */

namespace Web3\Transporters;

use GuzzleHttp\Client;

class Manager
{

    /**
     * host
     *
     * @var string
     */
    protected string $host;

    /**
     * @var float
     */
    protected float $timeout;


    protected ?Client $client = null;

    /**
     * @param  string  $host
     * @param  float  $timeout
     */
    public function __construct(string $host, float $timeout = 1.0)
    {
        $this->host    = $host;
        $this->timeout = $timeout;
        $this->getTransporter();
    }


    public function getTransporter():? Client
    {
        if (is_null($this->client)) {
            if (strpos($this->host, '127')){

            }
        }

        return $this->client;
    }

    /**
     * get host
     *
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * get timeout
     *
     * @return float
     */
    public function getTimeout(): float
    {
        return $this->timeout;
    }
}
