<?php

namespace App\Services\Goods;

use App\Http\Requests\GoodsSearchRequest;
use App\Models\Goods;

class Search
{
    public function __invoke($search, $goodsUnit): bool
    {
        $search = implode($search);
        $goods = Goods::find($goodsUnit->id);
        $associations = $goods->associations();
        $associations = $this->getArrayAssociations($associations);
        $mod = $goods->mod()[0]->title;
        $fullAssociations = $this->getAllSearchAssociations($associations, $goodsUnit->name, $mod);
        return $isFind = $this->find($search, $fullAssociations);
    }
    private function getArrayAssociations($associations): array
    {
        $associationsArray = [];
        foreach ($associations as $association) {
            $associationsArray[] = $association->title;
        }
        return $associationsArray;
    }

    private function getAllSearchAssociations(&$associations, $name, $mod): array
    {
        array_push($associations, $name, $mod);
        return $associations;
    }

    private function find($subject, &$queryData): bool
    {
        foreach ($queryData as $item) {
            if (preg_match("/$subject/", mb_strtolower($item))) {
                return true;
            }
        }
        return false;
    }
}
