<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePNRNewMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_n_r_new_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('symbolFootprintNeeds')->nullable();
            $table->string('existingSchematicSymbol')->nullable();
            $table->string('NoSymbolorFootprint')->nullable();
            $table->string('existingPCBFootprint')->nullable();
            $table->string('vendorPNCount')->nullable();
            $table->string('requestorName')->nullable();
            $table->string('requestorEmail')->nullable();
            $table->string('requestedSite')->nullable();
            $table->string('requestedDate')->nullable();
            $table->string('projectName')->nullable();
            $table->string('boardName')->nullable();
            $table->string('requestorType')->nullable();
            $table->string('partType')->nullable();
            $table->string('commodityCode')->nullable();
            $table->string('symbolName')->nullable();
            $table->string('footPrintName')->nullable();
            $table->string('pincount')->nullable();
            $table->string('partDescription')->nullable();
            $table->string('BIN_file')->nullable();
            $table->string('outlint_part_number')->nullable();
            $table->string('spec_part_number')->nullable();
            $table->string('notes_to_ce')->nullable();
            $table->string('notes_to_lib')->nullable();
            $table->string('InessPNRNumber')->nullable();
            $table->string('JuniperPNRNumber')->nullable();
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
        Schema::dropIfExists('p_n_r_new_masters');
    }
}
