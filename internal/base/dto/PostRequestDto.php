<?php

namespace internal\base\dto;

use InvalidArgumentException;
use JsonMapper;
use yii\base\Model;

class PostRequestDto extends Model
{

    /**
     * todo
     * @param $data
     * @param $paramsClass
     * @return mixed
     * @date: 2022/1/6 15:15
     */
    public static function getInstance($data)
    {
        $jsonMapper = new JsonMapper();
        $jsonMapper->bEnforceMapType = false;
        $obj = $jsonMapper->map(json_decode($data), new static());
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

    public function notNull($attribute, $params, $validator, $current)
    {
        if (is_array($current)) {
            $nullValue = array_filter($current, fn($x) => $x === null);
            if ($nullValue) {
                $this->addError($attribute, "参数不能包含 null");
                return false;
            }
        } elseif ($current === null) {
            $this->addError($attribute, "参数不能为 null");
            return false;
        }
        return true;
    }

}