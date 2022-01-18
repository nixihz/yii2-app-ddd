<?php

namespace internal\domain\demo\event;

use internal\domain\demo\entity\Demo;

class DemoCreatedEvent implements EventInterface
{

    public function __construct(
        public Demo $demo,
    )
    {
    }

}