<?php

declare(strict_types=1);

namespace App\Domain\Contexts\DTO;

class ProductDTO
{
    private string $code;
    private string $name;
    private float $price;
    private int $count;

    public function __construct(string $code, string $name, float $price, int $count = 1)
    {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
        $this->count = $count;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function incrementCount(): void
    {
        $this->count++;
    }
}

