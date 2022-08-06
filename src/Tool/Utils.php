<?php

namespace Web3\Tool;


use InvalidArgumentException;
use phpseclib3\Math\BigInteger as BigNumber;

class Utils
{

    /**
     * UNITS
     * from ethjs-unit
     *
     * @const array
     */
    const UNITS = [
        'noether'    => '0',
        'wei'        => '1',
        'kwei'       => '1000',
        'Kwei'       => '1000',
        'babbage'    => '1000',
        'femtoether' => '1000',
        'mwei'       => '1000000',
        'Mwei'       => '1000000',
        'lovelace'   => '1000000',
        'picoether'  => '1000000',
        'gwei'       => '1000000000',
        'Gwei'       => '1000000000',
        'shannon'    => '1000000000',
        'nanoether'  => '1000000000',
        'nano'       => '1000000000',
        'szabo'      => '1000000000000',
        'microether' => '1000000000000',
        'micro'      => '1000000000000',
        'finney'     => '1000000000000000',
        'milliether' => '1000000000000000',
        'milli'      => '1000000000000000',
        'ether'      => '1000000000000000000',
        'kether'     => '1000000000000000000000',
        'grand'      => '1000000000000000000000',
        'mether'     => '1000000000000000000000000',
        'gether'     => '1000000000000000000000000000',
        'tether'     => '1000000000000000000000000000000'
    ];

    /**
     * toWei
     * Change number from unit to wei.
     * For example:
     * $wei = Utils::toWei('1', 'kwei');
     * $wei->toString(); // 1000
     *
     * @param $number
     * @param $unit
     * @return BigNumber
     */
    public static function toWei($number, $unit): BigNumber
    {
        if (!is_string($number) && !($number instanceof BigNumber)) {
            throw new InvalidArgumentException('toWei number must be string or bignumber.');
        }

        if (!is_string($unit)) {
            throw new InvalidArgumentException('toWei unit must be string.');
        }
        if (!isset(self::UNITS[$unit])) {
            throw new InvalidArgumentException('toWei doesn\'t support '.$unit.' unit.');
        }
        $bn  = self::toBn($number);
        $bnt = new BigNumber(self::UNITS[$unit]);
        if (is_array($bn)) {
            [$whole, $fraction, $fractionLength, $negative1] = $bn;

            if ($fractionLength > strlen(self::UNITS[$unit])) {
                throw new InvalidArgumentException('toWei fraction part is out of limit.');
            }
            $whole = $whole->multiply($bnt);

            switch (BigNumber::getEngine()[0]) {
                case 'GMP':
                    $powerBase = gmp_pow(gmp_init(10), (int)$fractionLength);
                    break;
                case 'BCMath':
                    $powerBase = bcpow('10', (string)$fractionLength, 10);
                    break;
                default:
                    $powerBase = 10 ** (int)$fractionLength;
            }
            $base     = new BigNumber($powerBase);
            $fraction = $fraction->multiply($bnt)->divide($base)[0];

            if (!is_null($negative1)) {
                return $whole->add($fraction)->multiply($negative1);
            }
            return $whole->add($fraction);
        }

        return $bn->multiply($bnt);
    }

    /**
     * @param $number
     * @return array|BigNumber
     */
    public static function toBn($number)
    {
        if ($number instanceof BigNumber) {
            $bn = $number;
        } elseif (is_int($number)) {
            $bn = new BigNumber($number);
        } elseif (is_numeric($number)) {
            $number = (string)$number;

            if (Str::isNegative($number)) {
                $count     = 1;
                $number    = str_replace('-', '', $number, $count);
                $negative1 = new BigNumber(-1);
            }

            if (strpos($number, '.') > 0) {

                if (count(explode('.', $number)) > 2) {
                    throw new InvalidArgumentException('toBn number must be a valid number.');
                }

                [$whole, $fraction] = explode('.', $number);

                return [
                    new BigNumber($whole),
                    new BigNumber($fraction),
                    strlen($fraction),
                        $negative1 ?? null
                ];

            }

            $bn = new BigNumber($number);

            if (isset($negative1)) {
                $bn = $bn->multiply($negative1);
            }
        } elseif (is_string($number)) {
            $number = mb_strtolower($number);
            if (Str::isNegative($number)) {
                $count     = 1;
                $number    = str_replace('-', '', $number, $count);
                $negative1 = new BigNumber(-1);
            }
            if (Str::isZeroPrefixed($number) || preg_match('/^[\da-f]+$/i', $number) === 1) {
                $number = Str::stripZero($number);
                $bn     = new BigNumber($number, 16);
            } elseif (empty($number)) {
                $bn = new BigNumber(0);
            } else {
                throw new InvalidArgumentException('toBn number must be valid hex string.');
            }
            if (isset($negative1)) {
                $bn = $bn->multiply($negative1);
            }
        } else {
            throw new InvalidArgumentException('toBn number must be BigNumber, string or int.');
        }

        return $bn;
    }


}
