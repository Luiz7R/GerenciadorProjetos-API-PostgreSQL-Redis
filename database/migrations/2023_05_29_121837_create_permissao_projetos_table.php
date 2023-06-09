<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permissao_projetos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_projeto')->references('id')->on('projetos')->onDelete('cascade');
            $table->foreignId('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissao_projetos');
    }
};
