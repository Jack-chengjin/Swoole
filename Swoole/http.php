<?php
/**
 * Created by PhpStorm.
 * User: chengjin
 * Date: 2019/6/24
 * Time: 7:53
 */
$http = new Swoole\Http\Server("0.0.0.0", 8811);
$http->on('request', function ($request, $response) {
    print_r($request->get);
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
});
$http->start();