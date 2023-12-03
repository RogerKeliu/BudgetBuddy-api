<?php

namespace Tests\Feature\Scripts;

use Domain\Scripts\Domain\ScriptExecutionSteps;
use Domain\Scripts\Infrastructure\Eloquent\Script;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScriptListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_get_script_list(): void
    {
        // Arrange
        Script::factory()->count(10)->create();

        $script = Script::factory()->create([
            'name' => 'Massive Iata Check'
        ]);

        ScriptExecutionSteps::factory(5)->create(
            ['script_id' => $script->id]
        );


        // Action
        $response = $this->get('api/scripts');


        // Assert
        $response->assertStatus(200);

        /** Total Scripts in list */
        $this->assertEquals(16, count($response->json()));
        $script_id = $script->id;

        /** Total Scripts Executions in list */
        $filteredObjects = array_filter($response->json(), function ($object) use ($script_id) {
            return $object['id'] === $script_id;
        });

        $this->assertEquals(5, count(reset($filteredObjects)['script_execution']));
    }
}
