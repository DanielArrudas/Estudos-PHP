<?php
declare(strict_types=1);
class Transaction
{
    public int $amount;
    public string $description;

    public function __construct(int $amount, string $description)
    {
        $this->amount = $amount *100;
        $this->description = $description;
    }

    public function addTax(int $rate): int
    {
        return $this->amount += $this->amount * $rate / 100;
    }
    public function applyDiscount(int $rate): int
    {
        return $this->amount -= $this->amount * $rate / 100;
    }
}