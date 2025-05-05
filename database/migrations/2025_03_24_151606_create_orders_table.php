<?php

use App\Enum\OrderStatus;
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
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('set null');

            $table->string('order_number')->autoincrement()->startingValue(1);
            $table->string('status')->default(OrderStatus::ORDER_RECEIVED);

            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);

            $table->string('customer_first_name');
            $table->string('customer_last_name');

            $table->string('customer_phone')->nullable();

            $table->string('customer_company')->nullable();
            $table->string('customer_vat', 13)->nullable();
            $table->string('customer_fiscal_code', 16)->nullable();
            $table->string('customer_sdi', 7)->nullable();

            $table->string('customer_billing_address');
            $table->string('customer_billing_city');
            $table->string('customer_billing_state');
            $table->string('customer_billing_zip');
            $table->string('customer_billing_country');

            $table->string('customer_shipping_address')->nullable();
            $table->string('customer_shipping_city')->nullable();
            $table->string('customer_shipping_state')->nullable();
            $table->string('customer_shipping_zip')->nullable();
            $table->string('customer_shipping_country')->nullable();


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
