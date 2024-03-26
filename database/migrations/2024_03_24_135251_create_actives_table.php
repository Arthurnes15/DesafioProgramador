<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {   //Migration ativos
        Schema::create('actives', function (Blueprint $table) {
            $table->id();
            $table->string('active_name', 100);
            $table->text('active_dscp');
            $table->string('active_ctgr');
            $table->date('active_date');
            $table->float('active_value');
            $table->string('active_local');    
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('actives');
    }
};
