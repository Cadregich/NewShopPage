<?php

namespace App\Http\Controllers;


class MainPageController extends Controller
{
    public function __invoke()
    {
        return view('MainPage');
    }
}
