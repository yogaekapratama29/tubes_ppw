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
        Schema::create('citizen_reports', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('attachment_paths');
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
        Schema::dropIfExists('citizen_reports');
    }
};
