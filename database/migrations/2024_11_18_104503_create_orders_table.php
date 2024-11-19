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
            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');

            $table->decimal('price',8,2);
            $table->decimal('shipping_price',8,2);
            $table->decimal('total_price',8,2);

            $table->text('note')->nullable();
            $table->enum('status' , ['pending' , 'delivered' , 'completed' , 'canceled'])->default('pending');

            $table->string('country');
            $table->string('governorate');
            $table->string('city');
            $table->string('street');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');
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
