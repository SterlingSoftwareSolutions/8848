<?php

namespace App\Models;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'user_id',
        'order_type',
        'status',
        'payment_status',
        'discount',
        'order_date',
        'notes',

        'billing_first_name',
        'billing_last_name',
        'billing_company',
        'billing_address_line_1',
        'billing_address_line_2',
        'billing_city',
        'billing_zip',
        'billing_country',
        'billing_state',
        'billing_phone',

        'shipping_first_name',
        'shipping_last_name',
        'shipping_company',
        'shipping_address_line_1',
        'shipping_address_line_2',
        'shipping_city',
        'shipping_zip',
        'shipping_country',
        'shipping_state',
        'shipping_phone'
    ];

    protected $appends = [
        'count',
    ];

    public function email()
    {
        $order = $this;
        if(env('MAIL_USERNAME')){
            $pdf = Pdf::loadView('pdf.invoice', compact('order'))->setPaper('a4', 'portrait');

            // Send invoice to customer
            Mail::send([], [], function($message) use($pdf, $order) {
                $message->to($order->user->email)
                    ->subject('Confirmation for order ' . $order->reference)
                    ->attachData($pdf->output(), $order->reference . '.pdf', [
                        'mime' => 'application/pdf',
                    ]);
            });

            // Send invoice to admin
            $admin = User::where('role', 'admin')->first();
            Mail::send([], [], function($message) use($pdf, $order, $admin) {
                $message->to($admin->email)
                    ->subject('Confirmation for order ' . $order->reference)
                    ->attachData($pdf->output(), $order->reference . '.pdf', [
                        'mime' => 'application/pdf',
                    ]);
            });
        }
    }

    public function getTotalAttribute(){
        return $this->total();
    }

    public function getCountAttribute(){
        return $this->items->count();
    }

    public function items(){
        return $this->hasMany(OrderItems::class);
    }

    public function total(){
        $total = $this->items->sum(function($order_item){
            return $order_item->price * $order_item->quantity;
        });
        return $total;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items_editable()
    {
        return ($this->status == 'unverified' || $this->status == 'pending') && $this->order_type == 'wholesale';
    }
}
