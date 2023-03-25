<?php

declare(strict_types=1);

namespace App\Shop;


class BookService
{
    public function __construct(private readonly DiscountMachineInterface $discountMachine)
    {}

    private function prepareTransaction(array $items): BookTransaction
    {
        return new BookTransaction($items);
    }

    public function calculateDiscount($items): string
    {
        return $this->discountMachine->execute($this->prepareTransaction($items));
    }
}