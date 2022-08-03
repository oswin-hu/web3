<?php
/**
 * Author: oswin
 * Time: 2022/7/28-16:11
 * Description:
 * Version: v1.0
 */

namespace Web3;

final class Personal extends Web3Base
{

    protected array $allowedMethods = [
        'personal_newAccount',
        'personal_listAccounts',
        'personal_lockAccount',
        'personal_sign'
    ];
}
