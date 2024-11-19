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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();

            $table->string('product_name')->nullable();
            $table->longText('product_desc')->nullable();
            $table->integer('product_quantity');
            $table->decimal('product_price',8,2);
            $table->json('product_data')->nullable();

            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')
            ->onUpdate('cascade')->onDelete('set null');
            $table->foreign('order_id')->references('id')->on('orders')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
