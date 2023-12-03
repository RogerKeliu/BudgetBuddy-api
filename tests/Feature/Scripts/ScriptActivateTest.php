<?php

namespace Tests\Feature\Scripts;

use Domain\Scripts\Domain\ScriptExecutionSteps;
use Domain\Scripts\Infrastructure\Eloquent\Script;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScriptActivateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_activate(): void
    {
        // Arrange
        $script = Script::factory()->create([
            'active' => 0
        ]);


        // Action
        $response = $this->post('api/scripts/activate/' . $script->id);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('scripts', [
            'id' => $script->id,
            'active' => 1,
        ]);
    }

    /** @test */
    public function test_activate_list(): void
    {
        // Arrange
        $script = Script::factory()->create([
            'active' => 0
        ]);


        // Action
        $response = $this->post('api/scripts/activate/' . $script->id);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('scripts', [
            'id' => $script->id,
            'active' => 1,
        ]);
    }
}
