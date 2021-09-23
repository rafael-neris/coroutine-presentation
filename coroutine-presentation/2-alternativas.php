<?php

use Swoole\Coroutine\System;

final class SomeConsumer
{
    public function __invoke(int $i)
    {
        System::sleep(1);
        echo "Processing Message: $i\n";
    }
}

for ($i = 0; $i < 1000; $i++) {
    go(new SomeConsumer, $i);
}