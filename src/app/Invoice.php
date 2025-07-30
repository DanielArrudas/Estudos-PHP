<?php

namespace App;

class Invoice
{
    public function __get(string $name): void
    {
        var_dump($name);
    }

    public function __set(string $name, $value): void
    {
        var_dump($name, $value);
    }
    public function __tostring(): string
    {
        return "invoice object";
    }
}