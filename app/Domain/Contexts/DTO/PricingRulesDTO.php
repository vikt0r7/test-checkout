<?php

declare(strict_types=1);

namespace App\Domain\Contexts\DTO;

use App\Domain\Contexts\Contracts\PricingRule;

class PricingRulesDTO
{
    /** @var PricingRule[] */
    private array $rules;

    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * @return PricingRule[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * Returns a pricing rule for a product with a given code.
     */
    public function getPricingRuleByCode(string $code): ?PricingRule
    {
        return $this->rules[$code] ?? null;
    }
}

