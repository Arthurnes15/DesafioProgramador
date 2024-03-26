<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {   //Migration relação de um ativo para uma pessoa e de uma pessoa para vários ativos
        Schema::table('actives', function (Blueprint $table) {
            $table->foreignId('person_id')->constrained('person');
        });
    }

    public function down(): void
    {
        Schema::table('actives', function (Blueprint $table) {
            $table->dropForeign(['person_id']);
            $table->dropColumn('person_id');
        });
    }
};
