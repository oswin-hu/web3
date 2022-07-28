<?php
/**
 * Author: oswin
 * Time: 2022/7/22-14:26
 * Description:
 * Version: v1.0
 */

namespace Web3\Providers;

use Web3\Transporters\Transporter;

class Provider
{
    /**
     * @var Transporter
     */
    protected Transporter $transporter;

    /**
     * @var string
     */
    protected string $rpcVersion = '2.0';

    /**
     * @var int
     */
    protected int $id = 0;

    public function __construct(Transporter $transporter)
    {
        $this->transporter = $transporter;
    }


    /**
     * @return Transporter
     */
    public function getTransporter(): Transporter
    {
        return $this->transporter;
    }


}
