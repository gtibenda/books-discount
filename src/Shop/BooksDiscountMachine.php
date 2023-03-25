<?php

namespace App\Shop;

class BooksDiscountMachine implements DiscountMachineInterface
{
    private const BOOK_PRICE = 8;

    /**
     * @inheritDoc
     */
    public function execute(BookTransactionInterface $purchaseTransaction): string
    {
        $totalPrice  = 0;
        $isMoreBookTypes = true;

        $cartItems = $this->cleanupCartItems($purchaseTransaction->getItemQuantity());
        $volumes   = count($cartItems);

        while ($isMoreBookTypes) {
            $totalPrice += $this->calculatePrice($volumes);
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
            $totalPrice += ($cartItems[0] * self::BOOK_PRICE);
        }

        return sprintf('The discounted price is %s €', $totalPrice);

    }

    /**
     * @param array $items
     * @return array
     */
    private function cleanupCartItems(array $items): array
    {
        rsort($items);
        return array_filter($items);
    }

    private function calculatePrice($volumes): float|int
    {
        $totalPrice = $volumes * self::BOOK_PRICE;

        $discounted = $totalPrice * (new DiscountPercentage($volumes))->getDiscountedPercentage();

        return $totalPrice - $discounted;
    }
}