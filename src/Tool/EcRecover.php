<?php
/**
 * Author: oswin
 * Time: 2022/7/21-14:40
 * Description:
 * Version: v1.0
 */

namespace Web3\Tool;

use Crypto\Signature;
use Exception;
use kornrunner\Keccak;
use RuntimeException;

class EcRecover
{

    /**
     * @param  string  $msg
     * @param  string  $signed
     * @return string
     * @throws Exception
     */
    public static function personal_ecRecover(string $msg, string $signed): string
    {
        $msg = "\x19Ethereum Signed Message:\n".strlen($msg).$msg;
        $hex = self::keccak256($msg);
        return self::ecRecover($hex, $signed);
    }

    /**
     * @param  string  $msg
     * @param  string  $signed
     * @return string
     * @throws Exception
     */
    public static function eth_ecRecover(string $msg, string $signed): string
    {
        $hex = self::keccak256($msg);
        return self::ecRecover($hex, $signed);
    }

    /**
     * @param  string  $str
     * @return string
     * @throws Exception
     */
    public static function keccak256(string $str): string
    {
        return Str::add0x(Keccak::hash($str, 256));
    }

    /**
     * @param  string  $hex
     * @param  string  $signed
     * @return string
     * @throws Exception
     */
    public static function ecRecover(string $hex, string $signed): string
    {
        $rHex       = substr($signed, 2, 64);
        $sHex       = substr($signed, 66, 64);
        $vValue     = hexdec(substr($signed, 130, 2));
        $messageHex = substr($hex, 2);
        unpack('C*', hex2bin($messageHex));
        $messageGmp = gmp_init(Str::add0x($messageHex));
        $r          = $rHex;        //hex string without 0x
        $s          = $sHex;    //hex string without 0x
        $v          = $vValue;    //27 or 28

        //with hex2bin it gives the same byte array as the javascript
        unpack('C*', hex2bin($r));
        unpack('C*', hex2bin($s));
        $rGmp = gmp_init(Str::add0x($r));
        $sGmp = gmp_init(Str::add0x($s));

        $recovery = $v - 27;
        if ($recovery !== 0 && $recovery !== 1) {
            throw new RuntimeException('Invalid signature v value');
        }

        $publicKey       = Signature::recoverPublicKey($rGmp, $sGmp, $messageGmp, $recovery);
        $publicKeyString = $publicKey["x"].$publicKey["y"];
        return Str::add0x(substr(self::keccak256(hex2bin($publicKeyString)), -40));
    }
}
