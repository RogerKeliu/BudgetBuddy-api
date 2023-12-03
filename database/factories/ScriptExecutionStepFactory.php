<?php

namespace Database\Factories;

use Domain\Scripts\Infrastructure\Eloquent\Script;
use Domain\Scripts\Infrastructure\Eloquent\ScriptExecution;
use Domain\Scripts\Infrastructure\Eloquent\ScriptExecutionStep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ScriptExecutionStepFactory extends Factory
{
    protected $model = ScriptExecutionStep ::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'script_execution_id' => ScriptExecution::factory()->create(),
            'step' => 1,
            'status' => 'working',
            'message' => 'message of the step'
        ];
    }
}
