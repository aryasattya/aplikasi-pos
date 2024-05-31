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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignID('product_id')->references('id')->on('products')->onDelete('cascade')->index('product_foreignId');
            $table->foreignID('customer_id')->references('id')->on('customers')->onDelete('cascade')->index('customer_foreignID');
            $table->foreignID('user_id')->references('id')->on('users')->onDelete('cascade')->index('user_foreignID');
            $table->integer('quantity');
            $table->double('total_price');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
