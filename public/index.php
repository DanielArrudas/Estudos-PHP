<?php
session_start();
session_regenerate_id();
require 'teste.php';
$_SESSION['name'] = 'dan';
$_SESSION['person'] = ['name' => 'dan', 'age' => 20, 'city' => 'São Paulo'];