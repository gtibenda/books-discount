<?php

namespace App\Shop;

class BookTransaction implements BookTransactionInterface
{
    public function __construct(protected array $items)
    {
    }

    /**
     * @inheritDoc
     */
    public function getItemQuantity(): array
    {
        return $this->items;
    }
}