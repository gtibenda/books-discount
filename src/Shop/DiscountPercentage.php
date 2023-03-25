<?php

namespace App\Shop;

class DiscountPercentage implements DiscountedPercentageInterface
{
    public function __construct(
        protected int $volumeQuantity,
    ){}

    /**
     * @inheritDoc
     */
    public function getDiscountedPercentage(): float
    {
        return match($this->volumeQuantity) {
            2 => 0.05,
            3 => 0.1,
            4 => 0.2,
            5 => 0.25,
            default => 0,
        };
    }
}