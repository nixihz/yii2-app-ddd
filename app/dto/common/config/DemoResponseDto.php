<?php

namespace app\dto\common\config;

use internal\base\dto\Data;

class DemoResponseDto extends Data
{
    /** @var SelectOptionItem */
    public array $item;
}

class SelectOptionItem
{

    /** @var Option[] */
    public array $postTypeList;

    /** @var Option[] */
    public array $groupList;

    /** @var CategoryItem[] */
    public array $categoryList;

}

class Option
{
    public string $label;
    public int $value;
}

class CategoryItem
{
    public string $label;
    public int $value;
    /** @var CategoryItem[] */
    public array $children;
}
