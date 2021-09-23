<?php
use Swoole\Coroutine\System;

go(function() {
    System::sleep(1);
    echo 'Hello ';
});

go(function() {
    System::sleep(2);
    echo "PicPay Lovers! <3";
});