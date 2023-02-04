<?php

declare(strict_types=1);

namespace App\Domain\Shared\Rules\PricingRules;

use App\Domain\Contexts\Contracts\PricingRule;

class BulkDiscountRule implements PricingRule
{
    private int $minCount;
    private float $discountedPrice;

    public function __construct(int $minCount, float $discountedPrice)
    {
        $this->minCount = $minCount;
        $this->discountedPrice = $discountedPrice;
    }

    public function apply(float $price, int $count): float
    {
        return $count >= $this->minCount ? $this->discountedPrice * $count : $price * $count;
    }
}
