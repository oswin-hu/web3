<?php
/**
 * Author: oswin
 * Time: 2022/8/8-19:03
 * Description:
 * Version: v1.0
 */

namespace Web3\Methods\Eth;

use Web3\Formatters\TransactionFormatter;
use Web3\Methods\Method;

class SendTransaction extends Method
{

    protected array $inputFormatters = [
        TransactionFormatter::class
    ];
}
