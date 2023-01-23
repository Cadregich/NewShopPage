<?php

namespace App\Services\Goods;

use App\Models\Associations;
use App\Models\Goods;
use App\Models\Mods;
use App\Services\Service;
use Illuminate\Support\Facades\DB;


class Store
{
    public function GoodsStore($request)
    {
        $data = $request->validated();
        $img = $request->file('img');
        $mod = $data['mod_id'];
        $associations = $this->getAssociationsFromString($request['associations']);
        unset($data['associations'], $data['img'], $data['mod_id']);
        $latestItemId = Goods::first() === null ? 0 : Goods::latest()->first()->id;

        try {
            DB::beginTransaction();
            $modId = $this->createMod($mod)->id;
            $goods = $this->createGoods($data, $latestItemId, $modId, $img->extension());
            $this->syncAssociations($associations, $goods);
            $this->storeImg($img, $latestItemId);
            DB::commit();
            return 'Успешно загруженно';
        } catch (\Exception $exception) {
            DB::rollBack();
            $message = $exception->getMessage();
            return 'Неудачная загрузка: '.$message;
        }
    }

    public function getAssociationsFromString($string)
    {
        $associations = trim(str_replace(" ", "", $string));
        $associations = explode(',', $associations);
        return array_diff($associations, ['']);
    }
    public function syncAssociations($associations, $goods)
    {
        $attachAssociations = [];
        $attachAssociationsIds = [];
        foreach ($associations as $association) {
            $attachAssociations[] = Associations::firstOrCreate([
                'title' => $association
            ]);
        }
        foreach ($attachAssociations as $attachAssociation) {
            $attachAssociationsIds[] = $attachAssociation->id;
        }
        $goods->associations()->sync($attachAssociationsIds);
    }
    public function createMod($mod)
    {
        return Mods::firstOrCreate([
            'title' => $mod
        ]);
    }
    public function createGoods($data, $latestItemId, $modId, $imgExtension)
    {
        return Goods::create([
            'name' => $data['name'],
            'mod_id' => $modId,
            'img' => 'item' . ($latestItemId + 1) . '.' . $imgExtension,
            'price' => $data['price'],
        ]);
    }
    public function storeImg($img, $latestItemId)
    {
        $img->storeAs('uploads', 'item' . ($latestItemId + 1) . '.' . $img->extension(), 'public');
    }
}
