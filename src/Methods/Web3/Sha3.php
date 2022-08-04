<?php
/**
 * Author: oswin
 * Time: 2022/7/30-18:28
 * Description:
 * Version: v1.0
 */

namespace Web3\Methods\Web3;

use Web3\Formatters\HexFormatter;
use Web3\Methods\Method;

class Sha3 extends Method
{
    /**
     * @inheritdoc
     */
    protected array $inputFormatters = [
        HexFormatter::class
    ];
}
