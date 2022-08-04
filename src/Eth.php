<?php
/**
 * Author: oswin
 * Time: 2022/7/28-16:10
 * Description:
 * Version: v1.0
 */

namespace Web3;

final class Eth extends Web3Base
{

    protected array $allowedMethods = [
        'eth_protocolVersion',
        'eth_syncing',
        'eth_coinbase',
        'eth_mining',
        'eth_hashrate',
        'eth_gasPrice',
        'eth_accounts',
        'eth_blockNumber',
        'eth_getBalance',
        'eth_getStorageAt',
        'eth_getTransactionCount',
        'eth_getBlockTransactionCountByHash',
        'eth_getBlockTransactionCountByNumber',
        'eth_getUncleCountByBlockHash',
        'eth_getUncleCountByBlockNumber',
        'eth_getUncleByBlockHashAndIndex',
        'eth_getUncleByBlockNumberAndIndex',
        'eth_getCode',
        'eth_sign',
        'eth_sendTransaction',
        'eth_sendRawTransaction',
        'eth_call',
        'eth_estimateGas',
        'eth_getBlockByHash',
        'eth_getBlockByNumber',
        'eth_getTransactionByHash',
        'eth_getTransactionByBlockHashAndIndex',
        'eth_getTransactionByBlockNumberAndIndex',
        'eth_getTransactionReceipt',
        'eth_getCompilers',
        'eth_compileSolidity',
        'eth_compileLLL',
        'eth_compileSerpent',
        'eth_getWork',
        'eth_newFilter',
        'eth_newBlockFilter',
        'eth_newPendingTransactionFilter',
        'eth_uninstallFilter',
        'eth_getFilterChanges',
        'eth_getFilterLogs',
        'eth_getLogs',
        'eth_submitWork',
        'eth_submitHashrate'
    ];
}
