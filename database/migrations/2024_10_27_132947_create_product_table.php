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
        Schema::create('product', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động tăng
            $table->string('name');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->string('details', 500)->nullable();
            $table->string('image_1');
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('origin', 50)->nullable();
            $table->string('collection', 50)->nullable();
            $table->string('rel', 50)->nullable();
            $table->string('concentration', 50)->nullable();
            $table->string('fragrance_group', 50)->nullable();
            $table->string('style', 50)->nullable();
            $table->string('perfumer', 50)->nullable();
            $table->double('price');
            $table->bigInteger('quantity')->nullable();
            
            $table->double('price_buy');

            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
