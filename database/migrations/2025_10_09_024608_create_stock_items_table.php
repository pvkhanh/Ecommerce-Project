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
        Schema::create('stock_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('variant_id');
            $table->foreign('variant_id', 'fk_stock_items_variant_id')
                  ->references('id')
                  ->on('product_variants')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->integer('quantity')->default(0);
            $table->string('location', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('variant_id', 'idx_stock_items_variant_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stock_items', function (Blueprint $table) {
            $table->dropForeign('fk_stock_items_variant_id');
            $table->dropIndex('idx_stock_items_variant_id');
        });

        Schema::dropIfExists('stock_items');
    }
};
