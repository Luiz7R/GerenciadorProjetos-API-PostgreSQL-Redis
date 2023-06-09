<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TarefaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->text($this->faker->numberBetween(20,70)),
            'descricao' => $this->faker->paragraph(1),
            'id_projeto' => $this->faker->numberBetween(1, 10),
            'id_status' => $this->faker->numberBetween(1, 5),
            'data_conclusao' => $this->faker->date(),
            'id_usuario' => 1,
            'concluida' => $this->faker->numberBetween(0,1),
            'prioridade' => 'Media'
        ];
    }
}
