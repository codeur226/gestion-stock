<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrees', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('quantite_entree');
            $table->date('date_entree');
            //$table->integer('stock_initial');
            $table->foreignId("fournisseurs_id")->constrained();
            $table->foreignId("materiels_id")->constrained();
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
        Schema::table('entrees', function (Blueprint $table) {
            $table->dropForeign("fournisseurs_id");
            $table->dropForeign("materiels_id");
        });
        Schema::dropIfExists('entrees');
    }
}
