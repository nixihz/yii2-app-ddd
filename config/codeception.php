<?php
return yii\helpers\ArrayHelper::merge(
    [
        "id" => "codeception",
        'basePath' => dirname(__DIR__)
    ],
    require __DIR__ . '/main.php',
);