<?php
declare(strict_types=1);
use App\PaymentGateway\Paddle\Transaction;
use App\Toast\Toaster;
use App\Toast\ToasterPro;
require __DIR__ . '/../../vendor/autoload.php';

$toaster = new Toaster();
$toaster->addSlices('added slice');