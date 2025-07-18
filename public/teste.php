<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    var_dump($name, $email);
}