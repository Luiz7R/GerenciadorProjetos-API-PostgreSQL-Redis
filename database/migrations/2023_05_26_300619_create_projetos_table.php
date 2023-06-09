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
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 70);
            $table->string('descricao', 150);
            $table->date('data_entrega');
            $table->foreignId('id_usuario')->references('id')->on('users');
            $table->foreignId('id_status')->references('id')->on('status');
            $table->enum('ativo', ['0','1'])->default('1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projetos');
    }
};
