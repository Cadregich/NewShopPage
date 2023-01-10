<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;

class DataController extends Controller
{
    public function __invoke(DataRequest $request)
    {
        $data = $request->validated();
        if ($data['items-count'] === null) {
            $data['items-count'] = 1;
        }
        dd($data);
    }
}
