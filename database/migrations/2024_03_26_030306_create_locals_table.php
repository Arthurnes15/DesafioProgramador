<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {   //Migration localizações
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('active_street');
            $table->integer('active_street_number');
            $table->string('active_city');
            $table->string('active_state');
            $table->string('active_country');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locals');
    }
};
