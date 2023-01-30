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

        $goodsSearch = $this->searchHandler($searchQuery, $modQuery);
        $modId = Mods::where('title', $modQuery)->get()[0]->id;
        if ($searchQuery && $modQuery) {
            $goods = $goodsSearch->where('mod_id', $modId);
        }

        if ($searchQuery && !$modQuery) {
            $goods = $goodsSearch;
        }
        if ($modQuery && !$searchQuery) {
            $goods = Goods::where('mod_id', $modId);
        }

        if (!$modQuery && !$searchQuery) {
            $goods = Goods::orderBy('name', 'asc')->paginate(15)->withQueryString();
        } else {
            $goods = $goods->orderBy('name', 'asc')->paginate(15)->withQueryString();
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
        if ($searchQuery) {
            return $goods = Goods::where('name', 'LIKE', '%' . $searchQuery . '%')
                ->orWhereHas('associations', function ($query) use ($searchQuery) {
                    $query->where('title', 'like', '%' . $searchQuery . '%');
                });
        } else {
            return false;
        }
    }
}
