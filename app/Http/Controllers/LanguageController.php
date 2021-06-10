<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function __invoke($locale): RedirectResponse
    {
        session(['locale' => $locale]);

        return redirect()->action([ProductController::class, 'index']);
    }
}
