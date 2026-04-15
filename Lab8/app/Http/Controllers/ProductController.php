<?php

namespace App\Http\Controllers;

use App\Events\ProductCreated;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Throwable;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->get();

        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('image')) {
                $validated['image_path'] = $request->file('image')->store('products', 'public');
            }

            $product = Product::create($validated);

            event(new ProductCreated($product));

            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        } catch (QueryException|Throwable $exception) {
            report($exception);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Could not create product. Please try again.');
        }
    }

    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('image')) {
                if ($product->image_path) {
                    Storage::disk('public')->delete($product->image_path);
                }

                $validated['image_path'] = $request->file('image')->store('products', 'public');
            }

            $product->update($validated);

            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        } catch (QueryException|Throwable $exception) {
            report($exception);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Could not update product. Please try again.');
        }
    }

    public function destroy(Product $product): RedirectResponse
    {
        try {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }

            $product->delete();

            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        } catch (QueryException|Throwable $exception) {
            report($exception);

            return redirect()
                ->back()
                ->with('error', 'Could not delete product. Please try again.');
        }
    }
}
