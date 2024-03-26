<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {   //Migration pessoa
        Schema::create('person', function (Blueprint $table) {
            $table->id();
            $table->string('person_name');
            $table->string('person_type');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('person');
    }
};
