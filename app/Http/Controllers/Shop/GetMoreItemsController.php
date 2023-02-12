<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Purchases;
use Illuminate\Http\Request;

class GetMoreItemsController extends Controller
{
    public function __invoke(Request $request) {
        $offset = $request->input('offset');
        $limit = $request->input('limit');

        $purchases = Purchases::where('user_id', 1)
            ->offset($offset)->limit($limit)->get();

        $purchasesCount = Purchases::where('user_id', 1)->count();
        return response()->json([
            'purchases' => $purchases,
            'purchasesCount' => $purchasesCount
        ]);
    }
}
