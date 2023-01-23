<?php

namespace App\Services;


abstract class Service
{
    abstract public function GoodsStore($request);
    abstract public function Search($search, $goodsUnit);
}
