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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo', 70);
            $table->string('descricao', 150);
            $table->string('prioridade', 70);
            $table->date('data_conclusao');
            $table->foreignId('id_usuario')->references('id')->on('users');
            $table->foreignId('id_projeto')->references('id')->on('projetos');
            $table->foreignId('id_status')->references('id')->on('status');
            $table->enum('concluida', ['0','1'])->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
