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
        Schema::table('products', function (Blueprint $table) {
            // discount - tax_rate - visibility - meta title - meta description - stock status
            $table->integer('discount')->default(0)->after('price');
            $table->integer('tax_rate')->default(0)->after('discount');
            $table->tinyInteger('visibility')->default(1)->after('tax_rate');
            $table->string('meta_title')->nullable()->after('visibility');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->tinyInteger('stock_status')->default(1)->after('meta_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('discount');
            $table->dropColumn('tax_rate');
            $table->dropColumn('visibility');
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description');
            $table->dropColumn('stock_status');
        });
    }
};
