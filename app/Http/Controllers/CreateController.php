<?php

namespace App\Http\Controllers;


use App\Models\Mods;

class CreateController extends Controller
{
    public function __invoke()
    {
        $mods = Mods::orderBy('title', 'asc')->get();
        return view('CreateGoods', compact('mods'));
    }
}
