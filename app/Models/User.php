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
        'first_name',
        'last_name',
        'role',
        'priority',
        'email',
        'phone',
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

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function cart_items(){
        return $this->hasMany(CartItems::class);
    }

    public function cart_add($variant, $quantity = 1){

        if($variant instanceof Variant){
            $variant_id = $variant->id;
        } else{
            $variant_id = $variant;
        }

        $existing_cart_item = $this->cart_items()->where('variant_id', $variant_id)->first();

        if($existing_cart_item){
            // variant already in cart, just modify the quantity
            $existing_cart_item->quantity += $quantity;
            $existing_cart_item->save();

        } else{
            // Create a new cart item
            CartItems::create([
                'user_id' => $this->id,
                'variant_id' => $variant_id,
                'quantity' => $quantity
            ]);
        }
    }

    public function cart_update($variant, $quantity){

        if($variant instanceof Variant){
            $variant_id = $variant->id;
        } else{
            $variant_id = $variant;
        }

        $existing_cart_item = $this->cart_items()->where('variant_id', $variant_id)->first();

        if($existing_cart_item){
            $existing_cart_item->quantity = $quantity;
            $existing_cart_item->save();
            return true;
        } else{
            return false;
        }
    }

    public function cart_remove($variant){
        if($variant instanceof Variant){
            $variant_id = $variant->id;
        } else{
            $variant_id = $variant;
        }

        $existing_cart_item = $this->cart_items()->where('variant_id', $variant_id)->first();

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

    public function is_retail(){
        return $this->role == 'client_retail';
    }

    public function is_wholesale(){
        return $this->role == 'client_wholesale';
    }

    public function cart_total()
    {
        return $this->cart_items->sum(function ($cart_item) {
            return $cart_item->variant->price * $cart_item->quantity;
        });

    }

    public function cart_quantity()
    {
        return $this->cart_items->sum(function ($cart_item) {
            return $cart_item->quantity;
        });

    }
}
