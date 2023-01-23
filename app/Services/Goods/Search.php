<?php

namespace App\Services\Goods;

use App\Models\Goods;
use App\Services\Service;

class Search
{
    public function Search($search, $goodsUnit): bool
    {
        $search = implode($search);
        $goods = Goods::find($goodsUnit->id);
        $associations = $goods->associations()->get();
        $associations = $this->getArrayAssociations($associations);
        $associations[] = $goodsUnit->name;
        return $this->find($search, $associations);
    }
    private function getArrayAssociations($associations): array
    {
        $associationsArray = [];
        foreach ($associations as $association) {
            $associationsArray[] = $association->title;
        }
        return $associationsArray;
    }

    private function find($subject, $queryData): bool
    {
        foreach ($queryData as $item) {
            if (preg_match("/$subject/", mb_strtolower($item))) {
                return true;
            }
        }
        return false;
    }
}
