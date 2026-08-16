<?php

namespace App\Providers;

use App\Models\PurchaseOrder;
use App\Models\ServiceOrder;
use App\Models\StockOpname;
use App\Policies\PurchaseReceiptPolicy;
use App\Policies\StockOpnamePolicy;
use App\Policies\ServicePerbaikanPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\LaravelPdf\PdfFactory;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Str::macro('accountingNumber', function ($value, $decimals = 2) {
            if ($value < 0) {
                return '(' . number_format(abs($value), $decimals, ',', '.') . ')';
            }
            return number_format($value, $decimals);
        });

        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });

        Gate::policy(PurchaseOrder::class, PurchaseReceiptPolicy::class);
        Gate::policy(StockOpname::class, StockOpnamePolicy::class);
        Gate::policy(ServiceOrder::class, ServicePerbaikanPolicy::class);
    }
}
