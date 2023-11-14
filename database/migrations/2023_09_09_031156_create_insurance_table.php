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
        Schema::create('insurance', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('mem_id')->nullable();
            $table->string('u_id')->nullable();
            $table->string('e_id')->nullable();
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('sname')->nullable();
            $table->string('blood_type');
            $table->string('age');
            $table->string('gender');
            $table->string('birthday');
            $table->string('municipality');
            $table->string('barangay');
            $table->string('barangay_street');
            $table->string('level');
            $table->string('amount');
            $table->string('email');
            $table->string('status');
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->date('days_before_end')->nullable();
            $table->string('notified')->nullable();
            $table->string('type_of_payment');
            $table->string('proof_of_payment')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance');
    }
};
