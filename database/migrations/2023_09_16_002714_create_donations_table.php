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
        Schema::create('donations', function (Blueprint $table) {
            $table->string('id')->primary;
            $table->string('u_id')->nullable();
            $table->string('e_id')->nullable();
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('age');
            $table->string('gender');
            $table->string('municipality_city');
            $table->string('donated_amount');
            $table->string('donation_type')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('type')->nullable();
            $table->text('note')->nullable();
            $table->string('donator_info')->nullable();
            $table->binary('donation_proof')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
