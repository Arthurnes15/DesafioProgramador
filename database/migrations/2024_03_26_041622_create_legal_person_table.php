<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {   //Migration pessoa jurídica
        Schema::create('legal_person', function (Blueprint $table) {
            $table->id();
            $table->string('person_cnpj');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('legal_person');
    }
};
