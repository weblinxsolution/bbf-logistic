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
            $table->string('created_date');
            $table->string('pickup_date');
            $table->string('invoice_no');
            $table->string('shipper_name');
            $table->string('consignee_name');
            $table->string('added_by')->nullable();
            $table->string('user_email_id');
            $table->unsignedBigInteger('order_type_id');
            $table->unsignedBigInteger('status_type_id');
            $table->string('status')->nullable()->default(0);
            $table->foreign('order_type_id')->references('id')->on('shipping_types')->onDelete('cascade');
            $table->foreign('status_type_id')->references('id')->on('order_statuses')->onDelete('cascade');
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