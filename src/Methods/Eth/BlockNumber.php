<?php
/**
 * Author: oswin
 * Time: 2022/8/4-14:25
 * Description:
 * Version: v1.0
 */

namespace Web3\Methods\Eth;

use Web3\Formatters\BigNumberFormatter;
use Web3\Methods\Method;

class BlockNumber extends Method
{

    /**
     * @inheritdoc
     */
    protected array $outputFormatters = [
        BigNumberFormatter::class
    ];
}
