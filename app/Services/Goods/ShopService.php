<?php

namespace App\Services\Goods;

use App\Models\Goods;
use App\Models\Mods;
use App\Services\Service;

class ShopService extends Service
{
    public function Shop($request)
    {
        if (isset($request->validated()['search'])) {
            $searchQuery = mb_strtolower($request->validated()['search']);
        } else {
            $searchQuery = false;
        }
        if (isset($request->validated()['mod'])) {
            $modQuery = $request->validated()['mod'];
        } else {
            $modQuery = false;
        }
        $goods = $this->modHandler($modQuery);
        $goodsSearch = $this->searchHandler($searchQuery, $modQuery);
        if ($goodsSearch) $goods = $goodsSearch;

        if (!$modQuery && !$searchQuery) {
            $goods = Goods::paginate(15);
        } else {
            $goods = $goods->paginate(15);
        }
        return $goods;
    }

    private function modHandler($modQuery)
    {
        if ($modQuery) {
            $modId = Mods::where('title', $modQuery)->get()[0]->id;
            return $goods = Goods::where('mod_id', $modId);
        } else {
            return false;
        }
    }

    private function searchHandler($searchQuery, $modQuery)
    {
        if ($searchQuery && !$modQuery) {
            $goodsSearch = Goods::whereHas('associations', function ($query) use ($searchQuery) {
                $query->where('title', 'like', '%' . $searchQuery . '%');
            });
            return $goods = Goods::where('name', 'LIKE', '%' . $searchQuery . '%')->union($goodsSearch);
        } else {
            return false;
        }
    }
}
