<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projetos>
 */
class ProjetosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->text($this->faker->numberBetween(20,70)),
            'id_usuario' => 1,
            'descricao' => $this->faker->text($this->faker->numberBetween(20,150)),
            'id_status' => $this->faker->numberBetween(1, 5),
            'data_entrega' => $this->faker->date(),
            'ativo' => 1
        ];
    }
}
