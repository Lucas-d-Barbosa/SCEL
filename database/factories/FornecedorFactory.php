<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedor>
 */
class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telefone' => fake()->e164PhoneNumber(),
            'cidade' => fake()->city(),
            'estado' => fake()->stateAbbr(),
            'cpf_cnpj' => fake()->unique()->numberBetween(10000000000000, 99999999999999)
        ];
    }
}
