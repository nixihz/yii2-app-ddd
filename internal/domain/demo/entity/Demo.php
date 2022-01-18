<?php

namespace internal\domain\demo\entity;

class Demo
{
    public int $id;

    public string $comment;

    public string $createdAt;

    public string $updatedAt;

    public ?Demo $demoPO;
}