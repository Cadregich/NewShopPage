<?php

namespace App\Http\Controllers\Shop;


use App\Http\Controllers\Controller;
use App\Models\Purchases;

class HistoryController extends Controller
{
    public function __invoke()
    {
        return view('shop/PurchasesHistory');
    }
}
