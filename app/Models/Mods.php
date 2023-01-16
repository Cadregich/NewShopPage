<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mods extends Model
{
    protected $fillable = ['title'];
    use HasFactory;
    public function goods() {
        return $this->hasMany(Goods::class, 'mod', 'id');
    }
}
