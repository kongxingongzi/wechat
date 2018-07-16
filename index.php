<?php 

require __DIR__.'vendor/autolaod.php';

use EasyWeChat\Factory;

$options = [
    'app_id'    => 'wx54f0e94fbee136c0',
    'secret'    => '6ec9e287b58a6a06ef8cb04c604e9113',
    'token'     => 'weixin',
    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/easywechat.log',
    ],
    // ...
];

$app = Factory::officialAccount($options);

$server = $app->server;
$user = $app->user;

$server->push(function($message) use ($user) {
    $fromUser = $user->get($message['FromUserName']);

    return "{$fromUser->nickname} 您好！欢迎关注 overtrue!";
});

$server->serve()->send();