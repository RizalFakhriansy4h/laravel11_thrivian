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
            $table->string('username')->unique();
            $table->string('avatar')->default('/storage/avatar/default_avatar.png');
            $table->text('bio')->default('Hi There!');
            $table->boolean('role')->default(false);
            $table->boolean('is_active')->default(false);
            $table->string('email')->unique();
            $table->enum('gender', ['Male', 'Female', 'Other', 'not_specified'])->default('not_specified');
            $table->enum('interest', ['Business', 'Finance', 'Self Development', 'Other'])->default('Other');
            $table->string('phone_number')->default('Add Phone Number');
            $table->date('date_of_birth')->default('2001-01-01');
            $table->string('location')->default('Add Location');
            $table->timestamp('email_verified_at');
            $table->string('password')->nullable();
            $table->string('otp')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
