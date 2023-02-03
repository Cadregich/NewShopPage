<?php

namespace App\Services\Goods;

use App\Models\Goods;
use App\Models\Mods;

class ShopService
{
    public function Shop($request)
    {
        if ($request->has('search')) {
            $searchQuery = mb_strtolower($request->validated()['search']);
        } else {
            $searchQuery = false;
        }
        if ($request->has('mod')) {
            $modQuery = $request->validated()['mod'];
        } else {
            $modQuery = false;
        }

        $goodsHasQueries = $this->validateQueries($searchQuery, $modQuery);

        if (!$goodsHasQueries) {
//            $goods = Goods::join('mods', 'goods.mod_id', '=', 'mods.id')
//                ->orderBy('mods.title', 'asc')->toSql();
            $goods = Goods::join('mods', 'goods.mod_id', '=', 'mods.id')
                ->select('goods.id', 'goods.name', 'goods.mod_id', 'goods.price')
                ->orderBy('mods.title', 'asc')->paginate(15)->withQueryString();
        } else {
            $goods = $goodsHasQueries->join('mods','goods.mod_id', '=', 'mods.id')
                ->orderBy('mods.title', 'asc')
                ->select('goods.id', 'goods.name', 'goods.mod_id', 'goods.price')
                ->toSql();
            dd($goods);
        }
        return $goods;
    }

    private function searchHandler($searchQuery)
    {
        if ($searchQuery) {
            return Goods::where(function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%')
                    ->orWhereHas('associations', function ($query) use ($searchQuery) {
                        $query->where('title', 'like', '%' . $searchQuery . '%');
                    });
            });
        } else {
            return false;
        }
    }

    private function validateQueries($searchQuery, $modQuery)
    {
        $goodsSearch = $this->searchHandler($searchQuery);
        $modId = Mods::where('title', $modQuery)->get()[0]->id;
        if ($searchQuery && $modQuery) {
            $goods = $goodsSearch->where('mod_id', $modId);
        } elseif ($searchQuery && !$modQuery) {
            $goods = $goodsSearch;
        } elseif ($modQuery && !$searchQuery) {
            $goods = Goods::where('mod_id', $modId);
        } else {
            return false;
        }
        if ($modQuery) {
            $goods->orderBy('name');
        }
        return $goods;
    }
}
