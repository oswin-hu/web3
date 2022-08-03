<?php
/**
 * Author: oswin
 * Time: 2022/7/19-18:19
 * Description:
 * Version: v1.0
 */

namespace Web3\Transporters;

use ErrorException;
use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use JsonException;
use Psr\Http\Message\StreamInterface;

class Http extends Transporter implements Ihttp
{

    /**
     * @param  string  $payload
     * @return mixed
     * @throws ErrorException
     * @throws GuzzleException
     * @throws JsonException
     */
    public function request(string $payload)
    {
        $res = $this->client->post($this->host, $this->options($payload));

        /**
         * @var StreamInterface $res ;
         */
        $stream   = $res->getBody();
        $response = json_decode($stream, true, 512, JSON_THROW_ON_ERROR);
        $stream->close();

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new InvalidArgumentException('json_decode error: '.json_last_error_msg());
        }

        if (array_key_exists('error', $response)) {
            throw new ErrorException($response['error']['message'], $response['error']['code']);
        }

        return $response['result'];
    }
}
