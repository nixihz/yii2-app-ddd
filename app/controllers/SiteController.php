<?php

namespace app\controllers;

use internal\base\BaseController;

class SiteController extends BaseController
{

    public function actionIndex()
    {
        return $this->asJson(["Hello DDD!"]);
    }

    public function actionGetEnv()
    {
        $data = [
            "data" => [
                "env" => YII_ENV_PROD ? 1 : 0
            ],
        ];
        return $this->asJson($data);
    }

    public function actionError()
    {
        return $this->asJson(["400"]);
    }

}
