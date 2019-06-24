<?php
/**
 * Created by PhpStorm.
 * User: chengjin
 * Date: 2019/6/24
 * Time: 7:53
 */
$http = new Swoole\Http\Server("127.0.0.1", 9501);
$http->on('request', function ($request, $response) {
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
});
$http->start();