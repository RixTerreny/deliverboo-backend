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
        "name","description","price","visible","image"
        
    ];

    public function posts(){
        return $this->belongsToMany(Order::class);
    }
    public function restaurants() {
        return $this->belongsTo(restaurant::class);
    }

}
