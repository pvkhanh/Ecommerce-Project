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
        Schema::create('categoryables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->unsignedBigInteger('categoryable_id');
            $table->string('categoryable_type', 100);
            $table->timestamp('created_at')->useCurrent();
            $table->unique(
                ['category_id', 'categoryable_id', 'categoryable_type'],
                'catgbls_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoryables');
    }
};