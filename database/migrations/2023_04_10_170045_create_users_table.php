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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('last_name');
            $table->string('email')->unique();
            // $table->string('CIN')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('password');
            $table->enum('type', ['student', 'instructor', 'admin', 'superAdmin'])->default('student');
            $table->string('image')->nullable();
            $table->string('bywho');
            $table->enum('permission_type', ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'])->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
