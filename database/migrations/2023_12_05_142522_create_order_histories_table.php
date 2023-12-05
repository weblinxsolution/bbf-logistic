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
        Schema::create('order_histories', function (Blueprint $table) {
            $table->bigIncrements('id'); // Auto-incremented primary key
            $table->bigInteger('order_id')->unsigned(); // Assuming order_id is a foreign key
            $table->string('created_date')->nullable();
            $table->string('pickup_date')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('shipper_name')->nullable();
            $table->string('consignee_name')->nullable();
            $table->string('added_by')->nullable();
            $table->string('user_email_id')->nullable();
            $table->string('order_type_id')->nullable();
            $table->string('status_type_id')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_histories');
    }
};