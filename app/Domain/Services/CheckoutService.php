<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Contexts\Contracts\Checkout;
use App\Domain\Contexts\DTO\PricingRulesDTO;
use App\Domain\Contexts\DTO\ProductDTO;
use App\Domain\Contexts\DTO\ProductListDTO;
use JetBrains\PhpStorm\Pure;

class CheckoutService implements Checkout
{
    private PricingRulesDTO $pricingRules;

    private ProductListDTO $productList;

    #[Pure] public function __construct(PricingRulesDTO $pricingRules)
    {
        $this->pricingRules = $pricingRules;
        $this->productList = new ProductListDTO([]);
    }

    public function scan(ProductDTO $productDTO): void
    {
        if (!$this->productList->hasProduct($productDTO->getCode())) {
            $this->productList->addProduct($productDTO);
        } else {
            $this->productList->incrementProductCount($productDTO->getCode());
        }
    }

    public function total(): float
    {
        $total = 0;

        foreach ($this->productList->getProducts() as $product) {
            $price = $product->getPrice();
            $productCode = $product->getCode();
            $productCount = $product->getCount();

            $priceRule = $this->pricingRules->getPricingRuleByCode($productCode);
            if ($priceRule) {
                $price = $priceRule->apply($price, $productCount);
            }


            $total += $price;
        }

        return $total;
    }
}
