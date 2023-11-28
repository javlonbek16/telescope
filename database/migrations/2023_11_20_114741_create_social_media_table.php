<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('app_image');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('social_media');
    }
};
