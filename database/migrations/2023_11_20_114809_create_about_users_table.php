<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('about_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_job');
            $table->string('interest_topic');
            $table->string('cv_file');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_users');
    }
};
