<?php
ini_set('memory_limit', '256G');
use Swoole\Coroutine\System;
use Swoole\Coroutine\Channel;

$channel = new Channel();

go(static function () use ($channel) {
    for ($i = 1; $i < 10000; $i++) {
        go(static function () use ($i, $channel) {
            System::sleep(1);

            // Adiciona o valor processado no canal
            $channel->push([
                'index' => $i,
                'value' => random_int(1, 10000),
            ]);
        });
    }
});

go(static function () use ($channel) {
    while (true) {
        $data = $channel->pop();
        if (isset($data['index'])) {
            echo "{$data['index']} -> {$data['value']}\n";
        }
    }
});