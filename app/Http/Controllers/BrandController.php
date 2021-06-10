<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function index()
    {
        return view('layouts.brands.index', [
            'brands' => Brand::latest()->paginate(20)
        ]);
    }

    public function create()
    {
        return view('layouts.brands.create');
    }

    public function store(StoreBrandRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        /** @var User $user */
        $user = Auth::user();

        $user->brands()->create([
            'name' => $validated['name'],
            'website' => $validated['website'],
        ]);

        return redirect()->action([static::class, 'index']);
    }

    public function edit(Brand $brand)
    {
        return view('layouts.brands.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand): RedirectResponse
    {
        $validated = $request->validated();

        $brand->update([
            'name' => $validated['name'],
            'website' => $validated['website'],
        ]);

        return redirect()->action([static::class, 'index']);
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return redirect()->action([static::class, 'index']);
    }
}
