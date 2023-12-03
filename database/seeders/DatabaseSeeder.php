<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Domain\Scripts\Infrastructure\Eloquent\Script;
use Domain\Scripts\Infrastructure\Eloquent\ScriptExecution;
use Domain\Scripts\Infrastructure\Eloquent\ScriptExecutionStep;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BankAccountSeeder::class,
            BankTransactionSeeder::class
        ]);


        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'rogerroger',
        ]);
    }

    public function scripts()
    {
        $script = Script::factory()->create([
            'name' => 'Massive Iata Check'
        ]);

        $scripExecution = ScriptExecution::factory()->create(
            ['script_id' => $script->id]
        );

        ScriptExecution::factory(5)->create(
            ['script_id' => $script->id]
        );

        ScriptExecutionStep::factory(5)->create([
            'script_execution_id' => $scripExecution
        ]);

        Script::factory()->create([
            'name' => 'Iata Check'
        ]);

        Script::factory()->create([
            'name' => 'Airlines Account Number Files Gmail Reader'
        ]);

        Script::factory()->create([
            'name' => 'Compare Booking GG Webcargo'
        ]);

        Script::factory()->create([
            'name' => 'Shield Percent Abnormally'
        ]);
    }
}


