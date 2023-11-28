<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('user_certficates', function (Blueprint $table) {
            $table->id();
            $table->string('link_certficate');
            $table->string('image_certficate');
            $table->string('company_certficate');
            $table->date('date_reached');
            $table->string('expirece_date');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('user_certficates');
    }
};
