<?php

namespace App\Services;

use App\Services\Goods\Store;

class Service
{
    public function GoodsStore($request) {
        $store = new Store;
        return $store($request);
    }
}
