<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bank_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color')->default('#000000');
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        Schema::create('bank_type_labels', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('description');
            $table->string('search_value_description')->nullable();
            $table->string('search_value_type')->nullable();
            $table->string('search_value_comment')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_types');
        Schema::dropIfExists('bank_type_labels');
    }
};
