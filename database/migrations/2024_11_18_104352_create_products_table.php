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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->longText('small_desc')->unique();
            $table->longText('desc')->unique();
            $table->string('sku');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->date('available_for')->nullable();
            $table->boolean('manage_stock')->default(0);
            $table->integer('quantity');
            $table->decimal('price',8,2);
            $table->decimal('discount',8,2);
            $table->date('start_discount')->nullable();
            $table->date('end_discount')->nullable();
            $table->boolean('available_for_delivery')->default(1);
            $table->integer('available_in_stock')->default(1);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
