<?php
declare(strict_types=1);
require_once '../Transaction.php';

$transaction = new Transaction(15, "descrição");

$amount = substr_replace((string)$transaction->addTax(50), '.', -2);
echo 'tax: ' . $amount;
echo '<br>' . $transaction->amount;
echo '<br>discount: ' . $transaction->applyDiscount(100-66.6667);