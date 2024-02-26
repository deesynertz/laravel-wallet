<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialUnitablesTable extends Migration
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

        Schema::create('financial_unitables', function (Blueprint $table) use($models, $tableNames,$columnNames) {
            $table->id();
            $table->morphs('financialable');
            $table->foreignId($columnNames['financial_detail_key'])
                ->constrained($tableNames['financial_details'], 'id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->enum('purpose', (new $models['financial_details'])::ACCOUNTABLE_PURPOSES)
                ->default((new $models['financial_details'])::RECEIVE_ALL);
            $table->unique([$columnNames['financialable_type'],$columnNames['financialable_id'],$columnNames['financial_detail_key']], 'unitable_span_index');
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
        Schema::dropIfExists(config('wallet.table_names')['financial_unitables']);
    }
}