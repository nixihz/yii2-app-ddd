<?php

namespace internal\infra\utils;

use JsonMapper;

class ObjectMapper
{

    public static ?JsonMapper $jsonMapper = null;

    public static function mapObject($data, $class)
    {
        if (self::$jsonMapper == null) {
            self::$jsonMapper = new JsonMapper();
            self::$jsonMapper->bEnforceMapType = false;
        }
        return self::$jsonMapper->map($data, new $class);
    }

}