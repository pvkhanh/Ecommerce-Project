<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 100)->unique();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable()->index()
                ->comment('Parent category ID, null if root');

            $table->integer('level')->default(0);
            $table->integer('position')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('parent_id', 'fk_categories_parent_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign('fk_categories_parent_id');
        });
        Schema::dropIfExists('categories');
    }
};
