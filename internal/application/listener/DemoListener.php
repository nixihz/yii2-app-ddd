<?php

namespace internal\application\listener;


use internal\application\job\DemoJob;
use internal\domain\demo\event\DemoCreatedEvent;
use Yii;

class DemoListener
{

    public static function whenDemoCreated(DemoCreatedEvent $event)
    {
        $job = new DemoJob();
        $job->demoId = $event->demo->id;

        Yii::$app->queue->push($job);
    }

}
