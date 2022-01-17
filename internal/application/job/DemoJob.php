<?php

namespace internal\application\job;

use yii\base\BaseObject;
use yii\queue\JobInterface;

class DemoJob extends BaseObject implements JobInterface
{

    public $params;

    public function execute($queue)
    {
    }

}