<?php

namespace App\Http\Controllers;



use App\Models\Associations;
use App\Models\Goods;
use App\Models\Mods;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('CreateGoods');
    }
}
