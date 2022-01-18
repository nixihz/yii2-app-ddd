<?php

namespace internal\domain\demo\listener;

use internal\domain\demo\event\DemoCreatedEvent;

class DemoListener
{

    public static function whenDemoCreated(DemoCreatedEvent $event)
    {
    }

}
