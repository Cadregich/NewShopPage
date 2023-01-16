<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'goods';
    protected $guarded = [];

    public function associations() {
        return $this->belongsToMany(Associations::class,
            'goods_associations', 'goods_id', 'associations_id');
    }
    public function mod() {
        return $this->belongsTo(Mods::class, 'mod_id', 'id');
    }
}
