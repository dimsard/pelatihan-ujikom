<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->uuid('id_sales')->primary();
            $table->timestamp("tgl_sales")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->uuid("id_customer")->nullable();
            $table->string("do_number")->nullable();
            $table->enum("status", ["unpaid", "pending", "paid"]);
            $table->timestamps();

            $table->foreign('id_customer')->references('id_customer')->on('customers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
