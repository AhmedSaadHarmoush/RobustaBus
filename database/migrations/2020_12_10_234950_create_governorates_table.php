<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovernoratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('governorates', function (Blueprint $table) {
            $table->id();
            $table->string('value_AR');
            $table->string('value_EN');
            $table->timestamps();
        });
        Schema::table('cities', function (Blueprint $table) {
            $table->unsignedBigInteger('gov_id');
            $table->index('gov_id');
            $table->foreign('gov_id')->references('id')->on('governorates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities',function (Blueprint $table) {
            $table->dropForeign('cities_gov_id_foreign');
            $table->dropIndex('cities_gov_id_index');
            $table->dropColumn('gov_id');
        });
        Schema::dropIfExists('governorates');
    }
}
