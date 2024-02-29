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
            $table->string('email')->nullable();
            $table->string('username')->nullable();
            $table->string('social_id')->unique()->nullable();
            $table->timestamps();
            $table->dateTime('created_at')->default(now());
            $table->dateTime('updated_at')->default(now());
            $table->enum('device_type', ['IOS', 'ANDROID'])->nullable();
            $table->enum('login_type', ['GOOGLE', 'APPLE'])->nullable();
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
