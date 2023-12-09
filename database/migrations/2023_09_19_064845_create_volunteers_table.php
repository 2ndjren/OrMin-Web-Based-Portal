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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->string('id');
            $table->string('vol_id')->nullable();
            $table->string('u_id')->nullable();
            $table->string('e_id')->nullable();
            $table->binary('vol_profile')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('occupation')->nullable();
            $table->string('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('province')->nullable();
            $table->string('municipal')->nullable();
            $table->string('barangay')->nullable();
            $table->string('barangay_street')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('occupation_address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('role')->nullable();
            $table->binary('consent')->nullable();
            $table->string('email')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('privacy_agreement');
            $table->string('note')->nullable();
            $table->timestamps();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};