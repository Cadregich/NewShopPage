<?php

namespace App\Http\Controllers;

use App\Services\Goods\Store;

class BaseController extends Controller
{
    public $service;
    public function __construct(Store $service) {
        $this->service = $service;
    }
}
