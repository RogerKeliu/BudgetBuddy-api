<?php

namespace Tests\Feature\Scripts;

use Domain\Scripts\Infrastructure\Eloquent\Script;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScriptCreateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_post_script_create(): void
    {
        // Arrange
        $script = Script::factory()->make()->toArray();

        // Action
        $response = $this->post('api/scripts', $script);

        // Assert
        $response->assertStatus(200);

        $script_id = $response->json()['id'];

        $this->assertDatabaseHas('scripts', [
            'id' => $script_id
        ]);
    }

    public function test_post_script_create_without_name(): void
    {
        // Arrange
        $script = Script::factory()->make()->toArray();
        unset($script['name']);

        // Action
        $response = $this->post('api/scripts', $script);

        // Assert
        $response->assertStatus(200);

        $script_id = $response->json()['id'];

        $this->assertDatabaseHas('scripts', [
            'id' => $script_id
        ]);
    }
}
