<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable=[
        "name","address","photo","vat"
        
    ];
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function users() {
        return $this->belongsTo(User::class);
    }
    public function dishes() {
        return $this->belongsToManY(Dish::class);
    }
}
