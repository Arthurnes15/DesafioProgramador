<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {   // Migration relação de um local para muitos ativos .
        Schema::table('actives', function (Blueprint $table) {
            $table->foreignId('local_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::table('actives', function (Blueprint $table) {
            $table->foreignId('local_id')->constrained()->onDelete('cascade');
        });
    }
};
