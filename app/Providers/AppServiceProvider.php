<?php

namespace App\Providers;

use App\Domain\Contexts\Contracts\Checkout;
use App\Domain\Contexts\DTO\PricingRulesDTO;
use App\Domain\Contexts\Rules\PricingRules\BulkDiscountRule;
use App\Domain\Contexts\Rules\PricingRules\BuyOneGetOneFreeRule;
use App\Domain\Services\CheckoutService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Checkout::class, function () {
            $pricingRules = new PricingRulesDTO([
                    'FR1' => new BuyOneGetOneFreeRule(),
                    'SR1' => new BulkDiscountRule(3, 4.50),
                ]);

            return new CheckoutService($pricingRules);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
