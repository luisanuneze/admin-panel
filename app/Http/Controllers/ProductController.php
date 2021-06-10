<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        return view('layouts.products.index', [
            'products' => Product::with('brand')->latest()->paginate(20),
        ]);
    }

    public function create()
    {
        $brands = Brand::all();

        return view('layouts.products.create', compact('brands'));
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        /** @var User $user */
        $user = Auth::user();

        /** @var Brand $brand */
        $user->products()->create([
           'name' => $validated['name'],
           'model_number' => $validated['model_number'],
           'brand_id' => $validated['brand_id'],
        ]);

        return redirect()->action([static::class, 'index']);
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();

        return view('layouts.products.edit', compact('product', 'brands'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $validated = $request->validated();

        /** @var Brand $brand */
        $product->update([
            'name' => $validated['name'],
            'model_number' => $validated['model_number'],
            'brand_id' => $validated['brand_id'],
        ]);

        return redirect()->action([static::class, 'index']);
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->action([static::class, 'index']);
    }
}
