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
        Schema::create('order_worker', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('worker_id');

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('worker_id')->references('id')->on('workers');
            $table->integer("amount");
            $table->timestamps();

            $table->unique(['order_id', 'worker_id'], true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_worker');
    }
};
