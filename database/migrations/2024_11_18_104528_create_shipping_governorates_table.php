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
        Schema::create('shipping_governorates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('governorate_id')->nullable();
            $table->decimal('price',8 );
            $table->timestamps();
            $table->foreign('governorate_id')->references('id')->on('governorates')
                ->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_governorates');
    }
};
