<?php

namespace App\Models;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'title',
        'image',
        'price',
        'stock',
        'detail'
    ];

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
