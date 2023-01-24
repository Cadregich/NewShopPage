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
        $mods = Mods::all();
        $modsArray = [];
        foreach ($mods as $mod) {
            $modsArray[] = $mod->title;
        }
        sort($modsArray);
        if (isset($request->validated()['search'])) {
            $searchQuery = $request->validated()['search'];
        } else {
            $searchQuery = false;
        }
        if (isset($request->validated()['mod'])) {
            $modQuery = $request->validated()['mod'];
        } else {
            $modQuery = false;
        }

        if (!$modQuery && !$searchQuery) {
            $goods = Goods::paginate(15);
        } else {
            $goods = Goods::all();
        }
        $checkHandler = new Search;
        return view('shop', compact('goods','modsArray',
            'searchQuery', 'checkHandler', 'modQuery'));
    }
}
