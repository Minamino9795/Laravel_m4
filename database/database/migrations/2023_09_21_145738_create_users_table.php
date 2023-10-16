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
            $table->string('email');
            $table->timestamp('verified_at');
            $table->string('password');
            $table->string('remember_token');
            $table->timestamps();
            $table->string('address');
            $table->string('phone');
            $table->string('image');
            $table->string('gender');
            $table->string('birthday');
            $table->foreignId('group_id')->constrained('groups');
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
