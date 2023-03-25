<?php

declare(strict_types=1);

namespace App\Shop;

interface BookTransactionInterface
{
    /**
     * @return array
     */
    public function getItemQuantity(): array;

}