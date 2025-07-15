<?php

$value = "dados no cookie";

setcookie(
  'TestCookie',
    $value,
    strtotime('+2 days'),
);

$cookieName = $_COOKIE["TestCookie"];
if(isset($cookieName)) {
    echo $cookieName;
} else{
    echo "{$cookieName} is not setted";
}