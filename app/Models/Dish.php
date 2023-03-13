<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Restaurant ;

class Dish extends Model
{
    use HasFactory;
    protected $fillable=[
        // fix id restaurant beccato da tomas
        "name","description","price","visible","image","id_restaurant","image"
    ];

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
    public function restaurants() {
        return $this->belongsTo(restaurant::class);
    }

}
