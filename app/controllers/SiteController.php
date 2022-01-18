<?php

namespace app\controllers;

use internal\base\BaseController;

class SiteController extends BaseController
{

    public function actionIndex()
    {
        return $this->asJson(["Hello DDD!"]);
    }

}
