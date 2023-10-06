<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function address_billing(){
        return $this->hasOne(Address::class)->where('type', 'billing');
    }

    public function address_shipping(){
        return $this->hasOne(Address::class)->where('type', 'shipping');
    }

    public function cart_items(){
        return $this->hasMany(CartItems::class);
    }

    public function cart_add($product, $quantity = 1){

        if($product instanceof Product){
            $product_id = $product->id;
        } else{
            $product_id = $product;
        }

        $existing_cart_item = $this->cart_items()->where('product_id', $product_id)->first();

        if($existing_cart_item){
            // Product already in cart, just modify the quantity
            $existing_cart_item->quantity += $quantity;
            $existing_cart_item->save();

        } else{
            // Create a new cart item
            CartItems::create([
                'user_id' => $this->id,
                'product_id' => $product_id,
                'quantity' => $quantity
            ]);
        }
    }

    public function cart_update($product, $quantity){

        if($product instanceof Product){
            $product_id = $product->id;
        } else{
            $product_id = $product;
        }

        $existing_cart_item = $this->cart_items()->where('product_id', $product_id)->first();

        if($existing_cart_item){
            $existing_cart_item->quantity = $quantity;
            $existing_cart_item->save();
            return true;
        } else{
            return false;
        }
    }

    public function cart_remove($product){
        if($product instanceof Product){
            $product_id = $product->id;
        } else{
            $product_id = $product;
        }

        $existing_cart_item = $this->cart_items()->where('product_id', $product_id)->first();

        if($existing_cart_item){
            $existing_cart_item->delete();
            return true;
        } else{
            return false;
        }
    }

    public function cart_empty(){
        $this->cart_items()->delete();
    }
}
