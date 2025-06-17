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
            //description
            $table->string('description', length: 255);
            
            //amount
            $table->float('amount', precision: 53);
            //category
             $table->string('category', length: 100);
             //user id
             $table->foreignId('user_id');
            //transaction mode
            $table->string('payment_method', length: 100);
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
