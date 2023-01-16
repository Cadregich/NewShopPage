<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Models\Associations;
use App\Models\Goods;
use App\Models\Mods;
use Illuminate\Support\Facades\DB;
class StoreController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();
        $img = $request->file('img');;
        $mod = $data['mod_id'];
        $associations = $this->getAssociationsFromString($request['associations']);
        unset($data['associations'], $data['img'], $data['mod_id']);
        $latestItemId = Goods::first() === null ? 0 : Goods::latest()->first()->id;

        try {
            DB::beginTransaction();
            $modId = $this->createMod($mod)->id;
            $goods = $this->createGoods($data, $latestItemId, $modId);
            $this->syncAssociations($associations, $goods);
            $this->storeImg($img, $latestItemId);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }
    private function getAssociationsFromString($string)
    {
        $associations = trim(str_replace(" ", "", $string));
        $associations = explode(',', $associations);
        return array_diff($associations, ['']);
    }

    private function syncAssociations($associations, $goods)
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

    private function createGoods($data, $latestItemId, $modId)
    {
        return Goods::create([
            'name' => $data['name'],
            'mod_id' => $modId,
            'img' => 'uploads/item' . ($latestItemId + 1) . '.' . 'png',
            'price' => $data['price'],
        ]);
    }

    private function storeImg($img, $latestItemId)
    {
        $img->storeAs('uploads', 'item' . ($latestItemId + 1) . '.' . $img->extension(), 'public');
    }

    private function createMod($mod)
    {
        return Mods::firstOrCreate([
            'title' => $mod
        ]);
    }
}
