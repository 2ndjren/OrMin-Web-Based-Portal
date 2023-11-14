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
        Schema::create('employee', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_profile');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');                      
            $table->date('bday');        
            $table->string('age');                      
            $table->string('gender');                            
            $table->string('position');                            
            $table->string('phone_num');                     
            $table->string('email');             
            $table->string('password');            
            $table->string('account_status');             
            $table->string('type');             
            $table->string('token');             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
