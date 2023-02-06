<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Contexts\Contracts\Checkout;
use App\Domain\Contexts\DTO\ProductDTO;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CheckoutController extends Controller
{
    public function index(Checkout $checkout): Factory|View|Application
    {
        $productFROne = new ProductDTO("FR1", "Fruit tea", 3.11);
        $productSROne = new ProductDTO("SR1", "Strawberries", 5.00);
        $productCFOne = new ProductDTO("CF1", "Coffee", 11.23);

        $testBasketOne = [$productFROne, $productSROne, $productFROne, $productFROne, $productCFOne];
        $testBasketTwo = [$productFROne, $productFROne];
        $testBasketThree = [$productSROne, $productSROne, $productFROne, $productSROne];

        foreach ($testBasketThree as $product) {
            $checkout->scan($product);
        }

        $total = $checkout->total();

        return view('checkout', compact('total'));
    }
}
