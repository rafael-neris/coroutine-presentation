<?php

function a() {
    sleep(1);
    echo 'Hello';
    return yield;
}

function b() {
    sleep(2);
    echo 'Lerdao';
}

a();
b();