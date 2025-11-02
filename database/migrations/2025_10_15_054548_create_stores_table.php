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
        Schema::create('stores', function (Blueprint $table) {
            $table->id('store_id');
            $table->unsignedBigInteger('seller_id');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('logo');
            $table->string('banner');
            $table->string('email');
            $table->string('phone');
            $table->tinyInteger('status')->default(1)->comment('1=active, 0=inactive');
            $table->foreign('seller_id')->references('seller_id')->on('sellers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
