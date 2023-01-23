<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoodsSearchRequest;
use App\Models\Goods;
use App\Services\Goods\Search;

class ShopController extends BaseController
{
    public function __invoke(GoodsSearchRequest $request)
    {
        $searchQuery = $request->validated();
        $goods = Goods::all();
        $checkHandler = new Search;
        if ($searchQuery) {
            return view('shop', compact('goods','searchQuery', 'checkHandler'));
        }

        return view('shop', compact('goods'));
    }
}
