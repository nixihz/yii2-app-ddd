<?php

namespace internal\base\dto;

use InvalidArgumentException;
use JsonMapper;
use JsonMapper_Exception;
use yii\base\Model;

class BaseReqDto extends Model
{
    /**
     * todo
     * @param $data
     * @return mixed|object
     * @throws JsonMapper_Exception
     * @date: 2022/1/6 15:02
     */
    public static function getInstance($data)
    {
        $jsonMapper = new JsonMapper();
        $jsonMapper->bEnforceMapType = false;

        $obj = $jsonMapper->map($data, new static());
        if (!$obj->validate()) {
            $errorStr = "";
            foreach ($obj->errors as $attribute => $error) {
                $errorStr .= implode("，", $error);
            }
            if ($errorStr) {
                throw new InvalidArgumentException($errorStr);
            }
        }
        return $obj;
    }

    /** @see https://www.yiiframework.com/doc/guide/2.0/zh-cn/input-validation */
    public function rules()
    {
        return [];
    }

    public function load($data, $formName = null)
    {
        $this->setAttributes($data, false);
        if (!$this->validate()) {
            $errorStr = "";
            foreach ($this->errors as $attribute => $error) {
                $errorStr .= implode("，", $error);
            }
            if ($errorStr) {
                throw new InvalidArgumentException($errorStr);
            }
        }
    }

    /**
     * for dev only
     * @return string
     */
    public function printDocFormatQuery()
    {
        $lines = [];
        foreach ($this->getAttributes() as $attribute => $value) {
            $lines[] = $attribute . ":";
        }
        return implode("\n", $lines);
    }

    public function getPage()
    {
        return intval($this->page ?: 1);

    }

    public function getPageSize()
    {
        return intval($this->pageSize ?: 50);
    }

}