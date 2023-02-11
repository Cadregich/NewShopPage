<?php

namespace App\Http\Controllers\Shop;


use App\Http\Controllers\Controller;
use App\Models\Purchases;

class HistoryController extends Controller
{
    public function __invoke()
    {
        $purchases = Purchases::select('goods_name', 'goods_count', 'purchase_price', 'created_at')->limit(30)->get();
        $purchasesCount = Purchases::count();
        return view('shop/PurchasesHistory', [
            'purchases' => $purchases,
            'purchasesExist' => $purchases->count() > 0,
            'purchasesCount' => $purchasesCount
        ]);
    }
}
