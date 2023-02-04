<?php

declare(strict_types=1);

namespace App\Domain\Contexts\DTO;

use JetBrains\PhpStorm\Pure;

class ProductListDTO
{
    /** @var ProductDTO[] */
    private array $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    /**
     * @return ProductDTO[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    public function getProductsCount(): int
    {
        return count($this->products);
    }

    public function addProduct(ProductDTO $productDTO): void
    {
        if ($this->hasProduct($productDTO->getCode())) {
            $this->incrementProductCount($productDTO->getCode());
        } else {
            $this->products[] = $productDTO;
        }
    }

    /**
     * Check if a product with a given code exists in the list.
     */
    #[Pure] public function hasProduct(string $code): bool
    {
        foreach ($this->products as $product) {
            if ($product->getCode() === $code) {
                return true;
            }
        }
        return false;
    }

    /**
     * Increment the count of a product with a given code in the list.
     */
    public function incrementProductCount(string $code): void
    {
        foreach ($this->products as &$product) {
            if ($product->getCode() === $code) {
                $product->incrementCount();
            }
        }
    }
}
