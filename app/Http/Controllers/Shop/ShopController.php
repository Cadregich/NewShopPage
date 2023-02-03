<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\GoodsSearchRequest;
use App\Models\Mods;
use App\Services\Goods\ShopService;

class ShopController
{
    public function __invoke(GoodsSearchRequest $request)
    {
        $goods = new ShopService;
        $goods = $goods->Shop($request);
        $mods = Mods::orderBy('title', 'asc')->pluck('title');
        return view('Shop/Shop', compact('goods', 'mods'));
    }
}
