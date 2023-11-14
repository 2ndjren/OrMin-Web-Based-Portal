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
        Schema::create('blood', function (Blueprint $table) {
            $table->string('id');
            $table->string('u_id')->nullable();
            $table->string('e_id')->nullable();
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('sname')->nullable();
            $table->string('age');
            $table->string('gender');
            $table->date('birthday');
            $table->string('address')->nullable();
            $table->string('blood_type');
            $table->string('bag_count');
            $table->date('donated_at');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood');
    }
};
