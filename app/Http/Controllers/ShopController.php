<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoodsSearchRequest;
use App\Models\Goods;
use App\Models\Mods;
use App\Services\Goods\ShopService;
use Illuminate\Pagination\Paginator;

class ShopController
{
    public function __invoke(GoodsSearchRequest $request)
    {
        $goods = new ShopService;
        $goods = $goods->Shop($request);
        $mods = Mods::orderBy('title', 'asc')->pluck('title');
        return view('shop', compact('goods', 'mods'));
    }
}
