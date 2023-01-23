<?php

namespace App\Services;

use App\Services\Goods\Search;
use App\Services\Goods\Store;

class Service
{
    public function GoodsStore($request) {
        $store = new Store;
        return $store($request);
    }
//    public function GoodsSearch($request) {
//        $search = new Search;
//        return $search($request, 12);
//    }
}
