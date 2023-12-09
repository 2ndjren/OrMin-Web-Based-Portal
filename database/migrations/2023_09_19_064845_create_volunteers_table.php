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
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('occupation')->nullable();
            $table->string('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('province')->nullable();
            $table->string('municipal');
            $table->string('barangay')->nullable();
            $table->string('barangay_street')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('occupation_address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('role');
            $table->binary('consent')->nullable();
            $table->string('email')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('privacy_agreement')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQCrbaEZ9ekHl1IhCeRLEUJWfG19PwKlGJW7RYAphoH/Tflsxu9Clf6Ar44Tc/HcvIFdimEgkghoUmugiOcA55svJXJ1eMCudlvLQuJtnCRVKuUyIpNAdlU+wLl3OAClM4n0lWsutTE+o8N9DN3jL4vtJ4UNVmz2VPhzxrh+ScKXQKmRDy+8dF3aEBg+92YDP0DAeFav4PJLgut6azWGeS4BWYs4kyOlMOgbg6vobcKYmTcmYB9xTVaGh0YvfmfdPMZFIZNjn2Pu7FxbBq/ZHxwVKYqwrZCKRiRVA0vcIMVJIX92dSmWAvz5sMAKGQuqMf5kUGODMKZOPTsLzCqwTMRV u825376463@sg-nme-web595.main-hosting.eu
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};