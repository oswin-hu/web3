<?php
/**
 * Author: oswin
 * Time: 2022/7/22-14:26
 * Description:
 * Version: v1.0
 */

namespace Web3\Providers;

use Web3\Transporters\Manager;

class Provider
{
    /**
     * @var Manager
     */
    protected Manager $manager;

    /**
     * @var string
     */
    protected string $rpcVersion = '2.0';

    /**
     * @var int
     */
    protected int $id = 0;

    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }


    /**
     * @return Manager
     */
    public function getManager(): Manager
    {
        return $this->manager;
    }


}
