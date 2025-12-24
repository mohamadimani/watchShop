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
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->integer('price')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('image')->nullable();
            $table->string('guaranty')->nullable();
            $table->integer('count')->nullable();
            $table->integer('review')->default(0);
            $table->boolean('is_economy')->default(false);
            $table->boolean('is_special')->default(false);
            $table->integer('special_expired_at')->nullable();
            $table->integer('category_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('active_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
