<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sorties', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('quantite_sortie');
            $table->date('date_sortie');
            $table->string('imputable');
            $table->string('destination');
            //$table->foreignId("destinations_id")->constrained();
            $table->foreignId("materiels_id")->constrained();
            $table->string('reference');
            //$table->foreignId("fournisseurs_id")->constrained();
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
        Schema::table('sorties', function (Blueprint $table) {
            //$table->dropForeign("destinations_id");
            $table->dropForeign("materiels_id");
            //$table->dropForeign("fournisseurs_id");
            
        });
        Schema::dropIfExists('sorties');
    }
}
