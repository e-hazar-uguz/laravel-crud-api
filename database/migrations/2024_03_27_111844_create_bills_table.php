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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('amount');
            $table->string('status'); // paid , billed , void 3 seçenek
            $table->dateTime('billed_date'); // faturalandırma tarihi
            $table->dateTime('paid_date')->nullable(); // ödeme tarihi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
