<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\Mods;
use Illuminate\Http\Request;

class ShopController extends BaseController
{
    public function __invoke()
    {
        $goods = Goods::all();
        return view('shop', compact('goods'));
    }
}
