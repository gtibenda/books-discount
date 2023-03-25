<?php

namespace App\Shop;


interface DiscountMachineInterface
{
    /**
     * processes the discount and returns discount price as string
     *
     * @param BookTransactionInterface $purchaseTransaction
     *
     * @return string
     */
    public function execute(BookTransactionInterface $purchaseTransaction): string;
}