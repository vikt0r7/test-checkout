<?php

declare(strict_types=1);

namespace App\Domain\Contexts\Contracts;

interface PricingRule extends Rule
{
    public function apply(float $price, int $count): float;
}
