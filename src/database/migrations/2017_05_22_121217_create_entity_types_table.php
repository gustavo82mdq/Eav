<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('gustavo82mdq.eav.tables.entity_types'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('canonical_path');
            $table->string('icon', 20);
            $table->timestamps();

            $table->unique('name');
            $table->index('canonical_path');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('gustavo82mdq.eav.tables.entity_types'));
    }
}
