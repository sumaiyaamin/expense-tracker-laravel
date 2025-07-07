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
        Schema::create('expenses', function (Blueprint $table) {
    $table->id();

    // Description
    $table->string('description', 255);

    // Amount
    $table->float('amount', 53);

    // Category
    $table->string('category', 100);

    // User ID
    $table->foreignId('user_id');

    // Payment Method
    $table->string('payment_method', 100);

    // ✅ Add the missing date field
    $table->date('date');

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
