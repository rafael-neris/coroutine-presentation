<?php

go(static function a() {
    sleep(1);
    echo 'a';
});

function b() {
    sleep(2);
    echo 'b';
}

a();
b();