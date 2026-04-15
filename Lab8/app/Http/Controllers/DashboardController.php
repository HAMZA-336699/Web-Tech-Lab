<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $products = Product::query()->get();

        $totalProducts = $products->count();
        $totalInventoryValue = (float) $products->sum('price');
        $averagePrice = $totalProducts > 0
            ? (float) ($totalInventoryValue / $totalProducts)
            : 0.0;

        $categoryDistribution = $products
            ->groupBy('category')
            ->map(fn ($items) => $items->count())
            ->sortDesc();

        $priceByCategory = $products
            ->groupBy('category')
            ->map(fn ($items) => round((float) $items->avg('price'), 2))
            ->sortDesc();

        return view('dashboard.index', [
            'totalProducts' => $totalProducts,
            'totalInventoryValue' => $totalInventoryValue,
            'averagePrice' => $averagePrice,
            'categoryDistribution' => $categoryDistribution,
            'priceByCategory' => $priceByCategory,
        ]);
    }
}
