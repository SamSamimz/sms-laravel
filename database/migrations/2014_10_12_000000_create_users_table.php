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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('image')->nullable()->default('https://scontent.fdac142-1.fna.fbcdn.net/v/t39.30808-6/338723772_452259763741040_7434383476740232464_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=174925&_nc_eui2=AeH3NtT1qX4GOkZMPeZFYJMzG5XFyhLVKvUblcXKEtUq9TZ9kZZ5iaF7fcJkM6d2ltNUygQlPD5ga7K2XR7NKIrU&_nc_ohc=6H7gKrdtnUQAX-H_91P&_nc_ht=scontent.fdac142-1.fna&oh=00_AfCyIk2LW4kQ_E1N1E-DHEbUPmaPEnIpPGt_E6YMWtNfsQ&oe=649395A2');
            $table->rememberToken();
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
