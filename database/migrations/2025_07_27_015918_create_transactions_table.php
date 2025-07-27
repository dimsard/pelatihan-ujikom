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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid("id_transaction")->primary();
            $table->uuid("id_sales");
            $table->uuid("id_item");
            $table->integer("quantity");
            $table->decimal("price", 10, 2);
            $table->decimal("amount", 10, 2);
            $table->timestamps();

            $table->foreign('id_sales')->references('id_sales')->on('sales')->onDelete('cascade');
            $table->foreign('id_item')->references('id_item')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
