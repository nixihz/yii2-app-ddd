<?php

namespace internal\domain\demo\repository\impl;

use Carbon\Carbon;
use internal\domain\demo\repository\facade\DemoRepositoryInterface;
use internal\domain\demo\repository\po\DemoPO;
use yii\db\ActiveQuery;

class DemoRepository implements DemoRepositoryInterface
{
    public function query(): ActiveQuery
    {
        return DemoPO::find();
    }

    public function getDemoPO($id)
    {
        return DemoPO::findOne($id);
    }

    public function getDemoPOList($ids)
    {
        return DemoPO::find()->where(["in", "id", $ids])->all();
    }

    public function save(DemoPO $demoPO)
    {
        $demoPO->updated_at = Carbon::now()->format("Y-m-d H:i:s");
        $res = $demoPO->save();
        return $res;
    }

}
