<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataRequest;
use App\Models\Goods;

class DataController extends Controller
{
    public function __invoke(DataRequest $request)
    {
        $data = $request->validated();
        $goods = Goods::find($data['item-id']);
        dd(['id' => $goods->id, 'name' => $goods->name, 'price' => $goods->price, 'count' => $data['items-count']]);
        if ($data['items-count'] === null) {
            $data['items-count'] = 1;
        }
        dd($data);
    }
}
