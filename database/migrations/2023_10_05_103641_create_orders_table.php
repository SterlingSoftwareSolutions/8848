<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('reference')->unique();
            $table->enum('order_type', ['retail', 'wholesale']);
            $table->string('status');
            $table->string('payment_status');
            $table->decimal('discount', 10, 2);
            $table->timestamp('order_date');

            // Billing Address
            $table->string('billing_first_name');
            $table->string('billing_last_name');
            $table->string('billing_company')->nullable();
            $table->string('billing_address_line_1');
            $table->string('billing_address_line_2')->nullable();
            $table->string('billing_city');
            $table->string('billing_zip');
            $table->string('billing_state');
            $table->string('billing_phone');

            // Shipping Address
            $table->string('shipping_first_name');
            $table->string('shipping_last_name');
            $table->string('shipping_company')->nullable();
            $table->string('shipping_address_line_1');
            $table->string('shipping_address_line_2')->nullable();
            $table->string('shipping_city');
            $table->string('shipping_zip');
            $table->string('shipping_state');
            $table->string('shipping_phone');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
