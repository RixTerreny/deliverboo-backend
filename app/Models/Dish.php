<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order; 

class Dish extends Model
{
    use HasFactory;

    public function posts(){
        return $this->belongsToMany(Order::class);
    }
}
