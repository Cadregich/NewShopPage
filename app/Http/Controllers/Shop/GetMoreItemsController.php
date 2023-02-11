<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Purchases;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GetMoreItemsController extends Controller
{
    public function __invoke(Request $request) {
        $offset = $request->input('offset');
        $limit = $request->input('limit');

        $purchases = Purchases::offset($offset)->limit($limit)->get();

        return response()->json([
            'purchases' => $purchases,
        ]);
    }
}
