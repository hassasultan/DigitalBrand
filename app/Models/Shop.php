<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $table = "shop";
    protected $fillable = [
        "seller_id",
        "name",
        "branch_name",
        "address",
        "logo",
        "contact_number",
        "description",
        "status",
    ];
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id','id');
    }
}
