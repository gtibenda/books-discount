<?php

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