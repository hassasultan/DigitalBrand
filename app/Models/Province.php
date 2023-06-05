<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = "province";
    protected $fillable = [
        "name",
        "code",
        "status",

    ];
    public function cities()
    {
        return $this->hasMany(City::class,'province_id','id');
    }
}
