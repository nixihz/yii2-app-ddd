<?php

namespace internal\domain\thread\repository\impl;

use Carbon\Carbon;
use internal\domain\thread\repository\facade\PostRepositoryInterface;
use internal\domain\thread\repository\po\PostPO;
use yii\db\ActiveQuery;

class PostRepository implements PostRepositoryInterface
{
    public function query(): ActiveQuery
    {
        return PostPO::find();
    }

    public function getPost($id)
    {
        return PostPO::findOne($id);
    }

    public function getPostPOList($ids)
    {
        return PostPO::find()->where(["in", "id", $ids])->all();
    }

    public function getPostPOByUserId($userId)
    {
        return PostPO::find()->where(["in", "user_id", $userId])->all();
    }

    public function save(PostPO $postPO)
    {
        $postPO->updated_at = Carbon::now()->format("Y-m-d H:i:s");
        $res = $postPO->save();
        return $res;
    }

}
