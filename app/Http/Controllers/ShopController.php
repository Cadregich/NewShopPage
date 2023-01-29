<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoodsSearchRequest;
use App\Models\Goods;
use App\Models\Mods;
use App\Services\Goods\Search;

class ShopController extends BaseController
{
    public function __invoke(GoodsSearchRequest $request)
    {
        if (isset($request->validated()['search'])) {
            $searchQuery = mb_strtolower($request->validated()['search']);
        } else {
            $searchQuery = false;
        }
        if (isset($request->validated()['mod'])) {
            $modQuery = $request->validated()['mod'];
        } else {
            $modQuery = false;
        }
        if ($searchQuery) {
            $goods = Goods::whereHas('associations', function ($query) use ($searchQuery) {
                $query->where('title', 'like', '%' . $searchQuery . '%');
            });
            $goods = Goods::where('name', 'LIKE', '%' . $searchQuery . '%')->union($goods)->paginate(15);
        } else {
            $goods = Goods::paginate(15);
        }
        $mods = Mods::all();
        $mods = $mods->pluck('title')->sort();
        return view('shop', compact('goods', 'mods',
            'searchQuery', 'modQuery'));
    }
}
