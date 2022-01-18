<?php

namespace internal\application\job;

use yii\base\BaseObject;
use yii\queue\JobInterface;

class DemoJob extends BaseObject implements JobInterface
{

    public $demoId;

    public function execute($queue)
    {
    }

}