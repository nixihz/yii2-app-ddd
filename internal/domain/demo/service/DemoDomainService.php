<?php

namespace internal\domain\demo\service;

use Psr\EventDispatcher\EventDispatcherInterface;

class DemoDomainService
{

    public function __construct(
        public EventDispatcherInterface $eventDispatcher,
    )
    {
    }

}
