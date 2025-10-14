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
        Schema::create('imageables', function (Blueprint $table) {
            $table->id();
            //Cascade delete because if an image is removed, all its polymorphic relations should also be removed
            $table->foreignId('image_id')->constrained('images')->cascadeOnDelete();
            $table->morphs('imageable');
            $table->boolean('is_main')->default(false);
            $table->integer('position')->default(0);
            $table->timestamps();
            $table->unique(['image_id', 'imageable_id', 'imageable_type'],'imgbls_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imageables');
    }
};
