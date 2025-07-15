<?php

$name = 'dan';

function person(): void{
    global $name;
    echo $name . "\n";
}
person();