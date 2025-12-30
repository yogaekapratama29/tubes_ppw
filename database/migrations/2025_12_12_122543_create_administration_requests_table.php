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
        Schema::create('administration_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('nik')->nullable();
            $table->enum('letter_type', ['ktp', 'kk', 'sk']);
            $table->string('message');
            $table->string('response')->nullable();
            $table->enum('status', ['approved', 'rejected', 'pending'])->default('pending');
            $table->foreignId('user_id');
            $table->foreignId('admin_id')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administration_requests');
    }
};
