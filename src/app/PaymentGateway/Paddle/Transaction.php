<?php
declare(strict_types=1);

namespace App\PaymentGateway\Paddle;
class Transaction
{
    public function __construct(
        private float $amount,
    ) {
        $this->amount = $amount;
    }
    public function process(): void
    {
        echo 'Processing $' . $this->amount.  ' transaction';
    }
}