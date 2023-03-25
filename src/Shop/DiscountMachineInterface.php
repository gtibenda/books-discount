<?php

namespace App\Shop;


interface DiscountMachineInterface
{
    /**
     * @param BookTransactionInterface $purchaseTransaction
     *
     * @return string
     */
    public function execute(BookTransactionInterface $purchaseTransaction): string;
}