<?php

namespace Database\Factories;

use Domain\Scripts\Infrastructure\Eloquent\Script;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ScriptFactory extends Factory
{
    protected $model = Script::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'namespace' => fake()->filePath(),
            'description' => fake()->realTextBetween(50, 150),
            'active' => rand(0, 1)
        ];
    }
}

