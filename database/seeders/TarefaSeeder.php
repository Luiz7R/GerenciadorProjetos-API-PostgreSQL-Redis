<?php

namespace Database\Seeders;

use App\Models\Tarefa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tarefa::factory()
        ->count(50)
        ->create([
            'id_usuario' => 1
        ]);
    }
}
