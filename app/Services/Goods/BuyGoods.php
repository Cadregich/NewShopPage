<?php

namespace App\Services\Goods;


use App\Models\Goods;
use App\Models\Purchases;
use Illuminate\Support\Facades\DB;

class BuyGoods
{
    public function BuyGoods($request)
    {
        $data = $request->validated();
        $goodsCount = intval($data['items-count']);

        if (filter_var($goodsCount, FILTER_VALIDATE_INT) === false ||
            $goodsCount < 1 || $goodsCount > 999) {
            return 'error';
        }

        $goods = Goods::find($data['item-id']);

        if ($goods->id != $data['item-id']) {
            return 'error';
        }

        $purchaseDetails = [
            'goods_id' => $goods->id,
            'user_id' => 1,
            'goods_name' => $goods->name,
            'goods_count' => $goodsCount,
            'purchase_price' => $goods->price * $goodsCount
        ];

        return $this->createPurchases($purchaseDetails);
    }

    private function createPurchases($purchaseDetails)
    {
        try {
            DB::beginTransaction();
            Purchases::create($purchaseDetails);
            DB::commit();
            return 'done';
        } catch (\Exception $exception) {
            DB::rollBack();
            $message = $exception->getMessage();
            return 'error';
        }
    }

}
