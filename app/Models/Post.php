<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "post";
    protected $fillable = [
        "shop_id",
        "banner",
        "title",
        "description",
        "hash_tag",
        "IsFeature",
        "status",
    ];
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id','id');
    }
}
