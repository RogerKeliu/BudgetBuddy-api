<?php

namespace Tests\Feature\Scripts;

use Domain\Scripts\Domain\ScriptExecutionSteps;
use Domain\Scripts\Infrastructure\Eloquent\Script;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScriptViewTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_get_script_views(): void
    {
        // Arrange
        $script = Script::factory()->create([
            'name' => 'Massive Iata Check'
        ]);

        ScriptExecutionSteps::factory(5)->create(
            ['script_id' => $script->id]
        );


        // Action
        $response = $this->get('api/scripts/' . $script->id);


        // Assert
        $response->assertStatus(200);

        /** Total Scripts in List */
        $this->assertEquals(9, count($response->json()));

        /** Total Scripts in List Structure */
        $response->assertJsonStructure([
            'id',
            'name',
            'namespace',
            'description',
            'active',
            'deleted_at',
            'created_at',
            'updated_at',
            'script_execution'
        ]);

        /** Total Scripts Executions in List */
        $this->assertEquals(5, count($response->json()['script_execution']));

        /** Total Scripts Execution in List Structure */
        $response->assertJsonStructure([
            'id',
            'script_id',
            'executed_by',
            'successfully',
            'created_at',
            'updated_at',
            'script_execution_steps'
        ], $response->json()['script_execution'][0]);

    }
}
