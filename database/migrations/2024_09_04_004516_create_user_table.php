<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama');
            $table->string('email');
            $table->string('password');
            $table->string('level');
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('id_membership')->nullable()->constrained('membership')->onDelete('cascade');
            $table->foreignId('id_review')->nullable()->constrained('reviews')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};