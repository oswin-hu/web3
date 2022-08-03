<?php
/**
 * Author: oswin
 * Time: 2022/8/3-15:04
 * Description:
 * Version: v1.0
 */

namespace Web3\Methods\Net;

use Web3\Formatters\BigNumberFormatter;
use Web3\Methods\Method;

class PeerCount extends Method
{
    protected array $outputFormatters = [
        BigNumberFormatter::class
    ];
}
