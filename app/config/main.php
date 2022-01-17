<?php

use internal\base\ErrorHandler;
use internal\components\EventListener;


$params = array_merge(
    require __DIR__ . '/../../config/params.php',
    require __DIR__ . '/params.php',
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'runtimePath' => dirname(dirname(__DIR__)) . '/runtime/app',
    'controllerNamespace' => 'app\controllers',
    'bootstrap' => ['eventManager'],
    'modules' => [
    ],
    'components' => [
        'eventManager' => [
            'class' => EventListener::class
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            // 确保各环境不同
            'cookieValidationKey' => env("COOKIE_VALIDATION_KEY", '7aV--BOK25QUQrCRclyqH2K2F70MH'),
        ],
        'user' => [
            'identityClass' => 'internal\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'class' => ErrorHandler::class,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
    'params' => $params,
];
