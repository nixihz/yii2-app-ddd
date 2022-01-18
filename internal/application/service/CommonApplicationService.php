<?php

namespace internal\application\service;

use internal\domain\demo\service\DemoDomainService;
use Psr\EventDispatcher\EventDispatcherInterface;

class CommonApplicationService
{

    public function __construct(
        public DemoDomainService        $demoDomainService,
        public EventDispatcherInterface $eventDispatcher,
    )
    {

    }

    public function queryCategoryLevelList()
    {
        return $this->demoDomainService->queryCategoryLevelList();
    }

    public function queryGroupLevelList()
    {
        return $this->demoDomainService->queryGroupList();
    }

}