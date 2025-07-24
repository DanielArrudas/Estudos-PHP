<?php
declare(strict_types=1);

require_once '../Transaction.php';

$transaction = new Transaction(12, "sss");
var_dump($transaction);