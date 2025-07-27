<?php
declare(strict_types=1);

spl_autoload_register(
    function ($class) {
        $path = __DIR__ . '/../' . lcfirst(str_replace('\\', '/', $class)) . '.php';

        if (file_exists($path))
            include $path;
    }
);

use App\PaymentGateway\Paddle\Transaction;
use App\PaymentGateway\Stripe\Transaction as StripeTransaction;
use App\Notification\Email;

$paddleTransaction = new Transaction();
$stripeTransaction = new StripeTransaction();
$email = new Email();
var_dump($paddleTransaction, $stripeTransaction, $email);

