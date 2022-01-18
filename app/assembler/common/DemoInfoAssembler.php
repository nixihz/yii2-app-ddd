<?php

namespace app\assembler\common;

use app\dto\common\config\DemoResponseDto;
use internal\domain\demo\entity\Demo;

class DemoInfoAssembler
{

    public static function toResponseDto(Demo $demo)
    {
        $responseDto = new DemoResponseDto();

        return $responseDto;
    }

}