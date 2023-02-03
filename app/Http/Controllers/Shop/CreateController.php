<?php

namespace App\Http\Controllers\Shop;


use App\Http\Controllers\Controller;
use App\Models\Mods;

class CreateController extends Controller
{
    public function __invoke()
    {
        $mods = Mods::orderBy('title', 'asc')->get();
        return view('Shop/CreateGoods', compact('mods'));
    }
}
