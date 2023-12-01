<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('document');
            $table->string('shipper_name');
            $table->string('consignee_name');
            $table->string('email');
            $table->string('invoice_no');
            $table->string('status_name');
            $table->string('booking_size');
            $table->string('admin_remark');
            $table->string('customer_remark');
            $table->string('added_by');
            $table->string('pickup_date');
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
