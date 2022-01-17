<?php

namespace internal\application\service;

use internal\domain\thread\service\ThreadDomainService;
use internal\domain\user\service\UserDomainService;
use Psr\EventDispatcher\EventDispatcherInterface;

class CommonApplicationService
{

    public function __construct(
        public ThreadDomainService $threadDomainService,
        public EventDispatcherInterface $eventDispatcher,
    ) {

    }

    public function queryCategoryLevelList()
    {
        return $this->threadDomainService->queryCategoryLevelList();
    }

    public function queryGroupLevelList()
    {
        return $this->userDomainService->queryGroupList();
    }

}