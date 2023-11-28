<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('social_account_users', function (Blueprint $table) {
            $table->id();
            $table->string('social_account_link');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('social_media_id')->constrained('social_media');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_account_users');
    }
};
