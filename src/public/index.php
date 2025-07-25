<?php

require_once '../Transaction.php';

$transaction = new Transaction(100, "descrição")
->addTax(5)
->applyDiscount(10);

echo '<pre>';
var_dump($transaction);