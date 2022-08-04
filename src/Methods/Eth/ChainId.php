<?php
/**
 * Author: oswin
 * Time: 2022/8/4-17:19
 * Description:
 * Version: v1.0
 */

namespace Web3\Methods\Eth;

use Web3\Formatters\BigNumberFormatter;
use Web3\Methods\Method;

class ChainId extends Method
{
    /**
     * @inheritdoc
     */
    protected array $outputFormatters = [
        BigNumberFormatter::class
    ];
}
