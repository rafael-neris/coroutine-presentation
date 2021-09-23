<?php

use Swoole\Coroutine\System;
use Swoole\Coroutine\WaitGroup;

$wg = new WaitGroup();

go(static function () use ($wg) {
    $wg->add(3);

    go(static function () use ($wg) {
        System::sleep(3);
        echo "Funçāo 1\n";
        $wg->done();
    });

    go(static function () use ($wg) {
        System::sleep(2);
        echo "Funçāo 2\n";
        $wg->done();
    });

    go(static function () use ($wg) {
        System::sleep(1);
        echo "Funçāo 1\n";
        $wg->done();
    });

    // Aguarda a execução das corrotinas do grupo antes de executar as instruções abaixo
    $wg->wait();

    echo "\n---- \ ----\n";
    go(static function () {
        echo "\n[FIM]\n";
    });
});