<?php

declare(strict_types=1);

namespace App\Shop;


interface DiscountMachineInterface
{
    /**
     * processes the discount and returns discount price as string
     *
     * @param BookTransactionInterface $purchaseTransaction
     *
     * @return BooksDiscountMachine
     */
    public function execute(BookTransactionInterface $purchaseTransaction): BooksDiscountMachine;
}