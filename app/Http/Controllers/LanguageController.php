<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $lang)

    {
        session()->put('locale', $lang);
        return redirect()->back();
        //
    }
}
