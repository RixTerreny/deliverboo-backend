<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish; 

class Order extends Model
{
    
    use HasFactory;

    protected $fillable=[
        "date","total","customer_delivery_address","customer_phone","customer_name","customer_lastname"
        
    ];

    public function dish() {
        return $this->belongsToMany(Dish::class);
    }
    
}
