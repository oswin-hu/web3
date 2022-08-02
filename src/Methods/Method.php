<?php
/**
 * Author: oswin
 * Time: 2022/7/23-18:28
 * Description:
 * Version: v1.0
 */

namespace Web3\Methods;


class Method extends JsonRCP implements IMethod
{

    /**
     * inputFormatters
     *
     * @var array
     */
    protected array $inputFormatters = [];

    /**
     * outputFormatters
     *
     * @var array
     */
    protected array $outputFormatters = [];

    /**
     * getInputFormatters
     *
     * @return array
     */
    public function getInputFormatters(): array
    {
        return $this->inputFormatters;
    }

    /**
     * getOutputFormatters
     *
     * @return array
     */
    public function getOutputFormatters(): array
    {
        return $this->outputFormatters;
    }

    /**
     * @inheritdoc
     */
    public function transform(array $data, array $format): array
    {
        foreach ($data as $k => $v) {
            if (isset($format[$k])) {
                $formatted = call_user_func([$format[$k], 'format'], $v);
                $data[$k]  = $formatted;
            }
        }

        return $data;
    }
}
