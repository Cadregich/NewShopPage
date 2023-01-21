<?php

namespace App\Models;

use App\Http\Requests\CreateRequest;
use App\Services\Goods\Store;
use App\Services\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'goods';
    protected $guarded = [];
    private $service;
    public function __construct(array $attributes = [])
    {
        $this->service = new Service();
        parent::__construct($attributes);
    }


    public function associations()
    {
        return $this->belongsToMany(Associations::class,
            'goods_associations', 'goods_id', 'associations_id');
    }

    public function mod()
    {
        return $this->belongsTo(Mods::class, 'mod_id', 'id');
    }

    public function store(CreateRequest $request)
    {
        $store_condition = $this->service->GoodsStore($request);
        return redirect()->route('create')->with('status', $store_condition);
    }
}
