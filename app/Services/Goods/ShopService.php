<?php

namespace App\Services\Goods;

use App\Models\Goods;
use App\Models\Mods;

class ShopService
{
    public function buildGoodsQuery($request)
    {
        $searchQuery = $request->has('search') ? $request->validated()['search'] : false;
        $modQuery = $request->has('mod') ? $request->validated()['mod'] : false;

        $goodsHasQueries = $this->validateQueries($searchQuery, $modQuery);

        if (!$goodsHasQueries) {
            $goods = Goods::join('mods', 'goods.mod_id', '=', 'mods.id')
                ->select('goods.id', 'goods.name', 'goods.mod_id', 'goods.img', 'goods.price')
                ->orderBy('mods.title', 'asc')->paginate(15)->withQueryString();
        } else {
            $goods = $goodsHasQueries->join('mods','goods.mod_id', '=', 'mods.id')
                ->orderBy('mods.title', 'asc')
                ->select('goods.id', 'goods.name', 'goods.mod_id', 'goods.img', 'goods.price')
                ->paginate(15)->withQueryString();
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
        $modId = $modQuery ? Mods::where('title', $modQuery)->first()->id : false;

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
