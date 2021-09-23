<?php

function routine(): Generator
{
    for ($i=0; $i<=5; $i++) {
        echo "Coroutine: $i\n";
        yield;
    }
}

$generator = routine();
$generator->rewind();
for ($i = 0; $i <= 5; $i++) {
    echo "main: $i\n";
    $generator->next();
}