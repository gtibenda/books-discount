<?php

declare(strict_types=1);

namespace App\Shop;

class BooksDiscountMachine implements DiscountMachineInterface
{
    private const BOOK_PRICE = 8;
    public const CURRENCY   = '€';

    public float $totalPrice = 0;

    /**
     * @inheritDoc
     */
    public function execute(BookTransactionInterface $purchaseTransaction): BooksDiscountMachine
    {
        $isMoreBookTypes = true;

        $cartItems = $this->cleanupCartItems($purchaseTransaction->getItemQuantity());
        $volumes   = count($cartItems);

        while ($isMoreBookTypes) {
            $this->totalPrice += $this->calculatePrice($volumes);
            $newCartItems = array_map(static function ($cartItem) {
                return $cartItem - 1;
            }, $cartItems);
            $cartItems = $this->cleanupCartItems($newCartItems);
            $volumes   = count($cartItems);
            if ($volumes < 2) {
                $isMoreBookTypes = false;
            }
        }
        if(!empty($cartItems)) {
            $this->totalPrice += ($cartItems[0] * self::BOOK_PRICE);
        }

        return $this;
    }

    public function getAmount(): float
    {
        return $this->totalPrice;
    }

    /**
     * sorts array in ascending order and removes null values
     *
     * @param array $items
     *
     * @return array
     */
    private function cleanupCartItems(array $items): array
    {
        rsort($items);
        return array_filter($items);
    }

    /**
     * calculates total price after discount
     *
     * @param $volumes
     *
     * @return float|int
     */
    private function calculatePrice($volumes): float|int
    {
        $totalPrice = $volumes * self::BOOK_PRICE;

        $discounted = $totalPrice * (new DiscountPercentage($volumes))->getDiscountedPercentage();

        return $totalPrice - $discounted;
    }
}