<?php

namespace internal\application\listener;


use internal\domain\thread\event\PassedEvent;
use Yii;

class DemoListener
{

    public static function whenPostPassed(PassedEvent $event)
    {
        $job = new PostPassedJob();
        $job->postId = $event->post->id;

        Yii::$app->queue->push($job);
    }

    public static function whenPostDenied(DeniedEvent $event)
    {
        $job = new PostDeniedJob();
        $job->postId = $event->post->id;
        $job->remark = $event->remark;

        Yii::$app->queue->push($job);
    }


}
