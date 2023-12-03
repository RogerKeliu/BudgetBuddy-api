<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id')->unsigned();
            $table->string('label')->nullable();
            $table->string('iban')->unique();
            $table->float('amount')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('account_id')->unsigned()->nullable();
            $table->integer('bank_type_id')->unsigned()->nullable();

            $table->text('description')->nullable();
            $table->string('type')->nullable();

            $table->float('amount')->nullable();
            $table->string('currency')->nullable();

            $table->text('comment')->nullable();

            $table->float('available')->nullable();

            $table->boolean('no_profit')->default(false);

            $table->date('creation_date');
            $table->date('value_date')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
        Schema::dropIfExists('transactions');
    }
};
