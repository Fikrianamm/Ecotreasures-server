<?php

namespace App\Models;

use App\Models\User;
use App\Models\Wishlists;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    public function wishlist(){
        return $this->hasMany(Wishlists::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
