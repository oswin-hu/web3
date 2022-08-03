<?php
/**
 * Author: oswin
 * Time: 2022/7/22-14:26
 * Description:
 * Version: v1.0
 */

namespace Web3\Providers;

use JsonException;
use Web3\Methods\Method;

class HttpProvider extends Provider implements IProvider
{
    /**
     * @param  Method  $method
     * @return mixed
     * @throws JsonException
     */
    public function send(Method $method)
    {
        $payload = $method->toPayloadString();
        $res =  $this->transporter->request($payload);

        if (is_array($res)) {
            $res = $method->transform($res, $method->getOutputFormatters());
        } else {
            $res = $method->transform([$res], $method->getOutputFormatters())[0];
        }

        return $res;
    }

}
