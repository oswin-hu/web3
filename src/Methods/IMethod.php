<?php
/**
 * Author: oswin
 * Time: 2022/7/28-17:01
 * Description:
 * Version: v1.0
 */

namespace Web3\Methods;

interface IMethod
{
    /**
     * transform
     *
     * @param  array  $data
     * @param  array  $format
     * @return array
     */
    public function transform(array $data, array $format): array;
}
