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
            $table->integer('user_id');
            $table->double('total_amount')->default(0);
            $table->enum('status', ['pending', 'paid', 'sent', 'received'])->default('pending');
            $table->text('send_province')->nullable();
            $table->text('send_city')->nullable();
            $table->text('send_address')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('create_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
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
