<?php

namespace App\Http\Controllers;



use App\Models\Goods;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('CreateGoods');
    }
}
