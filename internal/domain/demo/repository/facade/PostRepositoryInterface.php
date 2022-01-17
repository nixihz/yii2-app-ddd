<?php

namespace internal\domain\thread\repository\facade;

use internal\domain\thread\repository\po\PostPO;

interface PostRepositoryInterface
{

    public function query();

    public function getPost($id);

    public function getPostPOList($ids);

    public function getPostPOByUserId($userId);

    public function save(PostPO $postPO);

}
