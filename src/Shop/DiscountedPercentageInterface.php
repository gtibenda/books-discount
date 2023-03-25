<?php

declare(strict_types=1);

namespace App\Shop;

interface DiscountedPercentageInterface
{
    /**
     * returns the percentage as float based on description
     *
     * @return float
     */
    public function getDiscountedPercentage(): float;

}