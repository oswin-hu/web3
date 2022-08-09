<?php
/**
 * Author: oswin
 * Time: 2022/7/28-16:11
 * Description:
 * Version: v1.0
 */

namespace Web3;

use JsonException;
use Web3\Tool\Validator;

final class Contract extends Web3Base
{
    /**
     * abi
     *
     * @var array
     */
    protected array $abi;

    /**
     * constructor
     *
     * @var array
     */
    protected array $constructor = [];

    /**
     * functions
     *
     * @var array
     */
    protected array $functions = [];

    /**
     * events
     *
     * @var array
     */
    protected array $events = [];

    /**
     * toAddress
     *
     * @var string
     */
    protected string $toAddress;

    /**
     * defaultBlock
     *
     * @var mixed
     */
    protected $defaultBlock;

    /**
     * __construct
     *
     * @param $provider
     * @param $abi
     * @param $defaultBlock
     * @throws JsonException
     */
    public function __construct($provider, $abi, $defaultBlock)
    {
        parent::__construct($provider);
        $this->setAbi($abi);
    }

    /**
     * getDefaultBlock
     *
     * @return string
     */
    public function getDefaultBlock(): string
    {
        return $this->defaultBlock;
    }

    /**
     * setDefaultBlock
     *
     * @param  string  $defaultBlock
     * @return $this
     */
    public function setDefaultBlock(string $defaultBlock): Contract
    {
        $this->defaultBlock = 'latest';

        if (Validator::tag($defaultBlock) || Validator::quantity($defaultBlock)) {
            $this->defaultBlock = $defaultBlock;
        }

        return $this;
    }

    /**
     * abi
     *
     * @param  string  $abi
     * @return Contract
     * @throws JsonException
     */
    public function abi(string $abi): Contract
    {
        $abiArr = json_decode($abi, true, 512, JSON_THROW_ON_ERROR);

        foreach ($abiArr as $item) {
            if (isset($item['type'])) {
                switch ($item['type']) {
                    case 'function':
                        $this->functions[] = $item;
                        break;
                    case 'constructor':
                        $this->constructor[] = $item;
                        break;
                    case 'event':
                        $this->events[] = $item;
                        break;

                }
            }
        }

        $this->abi = $abiArr;

        return $this;
    }

    /**
     * getAbi
     *
     * @return array
     */
    public function getAbi(): array
    {
        return $this->abi;
    }

    /**
     * @param  string  $abi
     * @return Contract
     * @throws JsonException
     */
    public function setAbi(string $abi): Contract
    {
        return $this->abi($abi);
    }

    /**
     * getFunctions
     *
     * @return array
     */
    public function getFunctions(): array
    {
        return $this->functions;
    }

    /**
     * getEvents
     *
     * @return array
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * getConstructor
     *
     * @return array
     */
    public function getConstructor(): array
    {
        return $this->constructor;
    }

    /**
     * at
     *
     * @param  string  $address
     * @return $this
     */
    public function at(string $address): Contract
    {
        $this->toAddress = $address;
        return $this;
    }


    public function __call($name, $arguments)
    {
    }
}
