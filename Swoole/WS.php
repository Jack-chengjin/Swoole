<?php
/**
 * Created by PhpStorm.
 * User: chengjin
 * Date: 2019/8/4
 * Time: 17:25
 */

class WS{
    const HOST = '0.0.0.0';
    const PORT = '8812';
    public $ws = '';

    public function __construct(){
        $this->WS = new Swoole\WebSocket\Server('0,0,0,0', 8812);

        $this->WS->on('open',[$this,'onOpen']);
        $this->WS->on('message',[$this,'onMessage']);
        $this->WS->on('close',[$this,'onClose']);
        $this->WS->start();
    }

    public function onOpen($server,$request){
        var_dump($request->fd);
    }

    public function onMessage($server,$frame){
        echo "server push message {$frame->data}\n";
        $server->push($frame->fd,'server push:'.date("Y-m-d H:i:s"));
    }


    public function onClose($server,$fd){
        echo "clientid:{$fd}";
    }
}

$obj = new WS();