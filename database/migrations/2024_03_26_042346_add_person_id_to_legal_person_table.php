<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {   //Migration relação de uma pessoa jurídica para uma pessoa
        Schema::table('legal_person', function (Blueprint $table) {
            $table->foreignId('person_id')->constrained('person');
        });
    }

    public function down(): void
    {
        Schema::table('legal_person', function (Blueprint $table) {
            $table->foreignId('person_id')->constrained()->onDelete('cascade');
        });
    }
};
