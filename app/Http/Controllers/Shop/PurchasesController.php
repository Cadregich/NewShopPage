<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

class PurchasesController extends Controller
{
    public function __invoke()
    {
        return view('shop/PurchasesHistory');
    }
}
