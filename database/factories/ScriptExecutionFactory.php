<?php

namespace Database\Factories;

use Domain\Scripts\Infrastructure\Eloquent\Script;
use Domain\Scripts\Infrastructure\Eloquent\ScriptExecution;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ScriptExecutionFactory extends Factory
{
    protected $model = ScriptExecution ::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $executedBy = [
            'roger',
            'scheduler'
        ];

        return [
            'script_id' => Script::factory()->create(),
            'executed_by' => $executedBy[rand(0, 1)],
            'successfully' => rand(0, 1)
        ];
    }
}
