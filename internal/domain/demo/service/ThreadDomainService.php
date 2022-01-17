<?php

namespace internal\domain\thread\service;

use internal\domain\thread\entity\Category;
use internal\domain\thread\entity\consts\EnumPost;
use internal\domain\thread\entity\consts\EnumPostReviewLog;
use internal\domain\thread\entity\Post;
use internal\domain\thread\event\DeniedEvent;
use internal\domain\thread\repository\facade\CategoryRepositoryInterface;
use internal\domain\thread\repository\facade\PostReviewLogRepositoryInterface;
use internal\domain\thread\repository\facade\ThreadRepositoryInterface;
use Psr\EventDispatcher\EventDispatcherInterface;

class ThreadDomainService
{

    public function __construct(
        public EventDispatcherInterface $eventDispatcher,
    ) {
    }

}
