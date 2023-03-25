<?php

namespace App\Shop;

interface BookTransactionInterface
{
    /**
     * @return array
     */
    public function getItemQuantity(): array;

}