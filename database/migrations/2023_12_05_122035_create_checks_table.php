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
        Schema::create('checks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');

            $table->unsignedBigInteger('booking_size');
            $table->foreign('booking_size')->references('id')->on('booking_sizes')->onDelete('cascade');

            $table->string('created_order_date');
            // $table->unsignedBigInteger('booking_size_id');
            $table->string('check');
            $table->string('status')->nullable(0);
            $table->unsignedBigInteger('status_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('order_statuses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checks');
    }
};