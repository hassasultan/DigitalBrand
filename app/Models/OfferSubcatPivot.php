<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferSubcatPivot extends Model
{
    use HasFactory;
    public function subcat()
    {
        return $this->belongsTo(SubCatogory::class,'subcat_id');
    }
    public function offer()
    {
        return $this->belongsTo(Post::class,'offer_id');
    }
}
