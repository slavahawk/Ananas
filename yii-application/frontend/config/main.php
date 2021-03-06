<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'enableCsrfValidation' => false,
        ],
        'user' => [
            'identityClass' => 'frontend\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                'abonement' => 'abonement/index',
                'contact' => 'site/contact',
                'catalog' => 'catalog/index',
                'favorite' => 'favorite/index',
                'favorite/add/<id:\d+>' => 'favorite/add',
                'category/<category:\w+>/<id:\d+>' => 'catalog/category',
                'cart' => 'cart/index',
                'cart/add/<id:\d+>' => 'cart/add',
            ],
        ],
    ],
    'params' => $params,
    'aliases' => [
        '@imgBackEnd' => '/kinza/yii-application/frontend/web/img',
        '@imgFrontEnd' => '/img',
    ],
];
