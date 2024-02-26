<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $models = config('wallet.models');
        $tableNames = config('wallet.table_names');
        $columnNames = config('wallet.column_names');

        Schema::create($tableNames['channels'], function (Blueprint $table) use($models) {
            $table->id();
            $table->string('title')->unique();
            $table->string('abbr')->nullable();
            $table->enum('type', (new $models['channels'])->channelTypesKey);
            $table->boolean('is_active')->default(true);
            $table->string('url')->nullable();
            $table->string('logo')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create($tableNames['financials'], function (Blueprint $table) {
            $table->id();
            $table->morphs('financialable');
            $table->enum('nature',['Single', 'Multiple'])->default('Single');
            $table->timestamps();
        });

        Schema::create($tableNames['financial_details'], function (Blueprint $table) use($models, $tableNames, $columnNames) {
            $table->id();
            $table->foreignId($columnNames['channel_key'])
                ->constrained($tableNames['channels'], 'id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId($columnNames['financial_key'])
                ->constrained($tableNames['financials'], 'id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->enum('purpose', (new $models['financial_details'])::ACCOUNTABLE_PURPOSES)
                ->default((new $models['financial_details'])::RECEIVE_ALL);
            $table->string('acc_name')->default(null);
            $table->string('body');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('wallet.table_names');
        Schema::dropIfExists($tableNames['financial_details']);
        Schema::dropIfExists($tableNames['financials']);
        Schema::dropIfExists($tableNames['channels']);

    }
}