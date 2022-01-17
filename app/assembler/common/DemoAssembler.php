<?php

namespace app\assembler\common;

use app\dto\common\config\CategoryItem;
use app\dto\common\config\DemoResponseDto;
use app\dto\common\config\Option;
use app\dto\common\config\SelectOptionItem;
use internal\domain\thread\entity\Category;
use internal\domain\user\entity\Group;

class DemoAssembler
{

    /**
     * @param Category[] $categoryLevelList
     * @param Group[] $groupList
     */
    public static function toResponseDto($reviewStatusList, $postTypeList, $groupList, array $categoryLevelList)
    {
        $responseDto = new DemoResponseDto();
        $selectOptionItem = new SelectOptionItem();

        // 没有强制限制类型；
        $selectOptionItem->reviewStatusList = $reviewStatusList;
        $selectOptionItem->postTypeList = $postTypeList;

        // 分组
        $groupItems = [];
        foreach ($groupList as $group) {
            $groupItem = new Option();
            $groupItem->label = $group->name;
            $groupItem->value = $group->id;
            $groupItems[] = $groupItem;
        }
        $selectOptionItem->groupList = $groupItems;

        // 分类
        $categoryItems = [];
        foreach ($categoryLevelList as $category) {
            $categoryItem = new CategoryItem();
            $categoryItem->label = $category->name;
            $categoryItem->value = $category->id;
            $categoryItem->children = [];
            foreach ($category->children as $child) {
                $childItem = new CategoryItem();
                $childItem->label = $child->name;
                $childItem->value = $child->id;
                //兼容前端组建，如果没有 下级， children 取消
                //$childItem->children = [];
                $categoryItem->children[] = $childItem;
            }

            $categoryItems[] = $categoryItem;
        }
        $selectOptionItem->category = $categoryItems;
        $responseDto->item = (array)$selectOptionItem;

        return $responseDto;
    }

}