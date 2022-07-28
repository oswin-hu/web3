<?php
/**
 * Author: oswin
 * Time: 2022/7/28-16:54
 * Description:
 * Version: v1.0
 */

namespace Web3\Methods;

use JsonException;

class JsonRCP implements RPC
{


    /**
     * @var string
     */
    protected string $method = '';

    /**
     * @var string
     */
    protected string $rpcVersion = '2.0';

    /**
     * @var int
     */
    protected int $id = 0;

    /**
     * @var array
     */
    protected array $arguments = [];


    public function __construct(string $method, array $arguments = [])
    {
        $this->method    = $method;
        $this->arguments = $arguments;
    }

    /**
     * set id
     *
     * @param  int  $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * get id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * get rpc version
     *
     * @return string
     */
    public function getRpcVersion(): string
    {
        return $this->rpcVersion;
    }

    /**
     * get method
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * set arguments
     *
     * @param  array  $arguments
     * @return void
     */
    public function setArguments(array $arguments): void
    {
        $this->arguments = $arguments;
    }

    /**
     * get arguments
     *
     * @return array
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * toPayload
     *
     * @return array
     */
    public function toPayload(): array
    {
        return [
            'id'      => $this->id ?: mt_rand(),
            'jsonrpc' => $this->rpcVersion,
            'method'  => $this->method,
            'params'  => $this->arguments
        ];
    }


    /**
     * toPayloadJson
     *
     * @return string
     * @throws JsonException
     */
    public function toPayloadString(): string
    {
        $payload = $this->toPayload();
        return (string)json_encode($payload, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
    }
}
