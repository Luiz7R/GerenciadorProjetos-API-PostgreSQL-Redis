<?php

namespace Database\Seeders;

use App\Models\Projetos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjetosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Projetos::factory()->create(['id' => $i]);
        }
    }
}
