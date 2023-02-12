<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataRequest;
use App\Models\Purchases;
use App\Services\Goods\BuyGoods;

class GoodsBuyController extends Controller
{
    public function __invoke(DataRequest $request)
    {
        $buyGoods = new BuyGoods;
        $buyCondition = $buyGoods->BuyGoods($request);
        if ($buyCondition === 'error') {
            return redirect()->route('shop')->with('status', 'error');
        }
        return redirect()->route('shop')->with('status', $buyCondition);
    }
}
