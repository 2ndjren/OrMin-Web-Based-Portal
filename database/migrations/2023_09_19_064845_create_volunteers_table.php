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
            $table->string('vol_profile')->nullable();
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('occupation');
            $table->string('birthday');
            $table->string('gender');
            $table->string('nationality');
            $table->string('civil_status');
            $table->string('province');
            $table->string('municipal');
            $table->string('barangay');
            $table->string('barangay_street')->nullable();
            $table->string('postal_code');
            $table->string('occupation_address');
            $table->string('phone_no');
            $table->string('role')->nullable();
            $table->string('consent')->nullable();
            $table->string('email');
            $table->date('expiration_date')->nullable();
            $table->string('privacy_agreement');
            $table->string('note')->nullable();
            $table->timestamps();
            $table->string('status');
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
