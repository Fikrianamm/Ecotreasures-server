<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\User;
use App\Models\Review;
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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }

    public function wishlists(){
        return $this->belongsToMany(Wishlist::class, 'wishlist_items', 'wishlist_id', 'product_id');
    }

    public function cart(){
        return $this->belongsToMany(Cart::class, 'cart_items', 'product_id', 'cart_id')->withPivot('quantity');
    }
}
