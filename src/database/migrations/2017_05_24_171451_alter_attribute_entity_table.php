<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAttributeEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(config('rinvex.attributable.tables.attribute_entity'), function (Blueprint $table) {
            $table->integer('entity_type')->unsigned()->change();

            $table->foreign('entity_type')
                ->references('id')
                ->on(config('gustavo82mdq.eav.tables.entity_types'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attribute_entity', function (Blueprint $table) {
            $table->dropForeign('entity_type');
            $table->string('entity_type')->change();
        });
    }
}
