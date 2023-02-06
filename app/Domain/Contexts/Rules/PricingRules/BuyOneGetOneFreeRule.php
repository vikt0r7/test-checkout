<?php

declare(strict_types=1);

namespace App\Domain\Contexts\Rules\PricingRules;

use App\Domain\Contexts\Contracts\PricingRule;

class BuyOneGetOneFreeRule implements PricingRule
{
    public function apply(float $price, int $count): float
    {
        return (intdiv($count, 2) + $count % 2) * $price;
    }
}
