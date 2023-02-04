<?php

declare(strict_types=1);


namespace App\Domain\Contexts\Contracts;

use App\Domain\Contexts\DTO\ProductDTO;

interface Checkout
{
    public function scan(ProductDTO $productDTO): void;
}
