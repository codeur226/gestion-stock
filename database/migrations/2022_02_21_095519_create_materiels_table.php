<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiels', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("noSerie")->unique();
            //$table->integer('quantite_entree');
            //$table->date('date_entree');
            $table->string("imageUrl")->nullable();
            $table->integer('stock')->default(0);
            //$table->foreignId("fournisseurs_id")->constrained();
            $table->boolean("estDisponible")->default(1);
            $table->foreignId("categorie_materiels_id")->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("materiels", function(Blueprint $table){
            $table->dropForeign("categorie_materiels_id");
           // $table->dropForeign("fournisseurs_id")->constrained();
        });
        Schema::dropIfExists('materiels');
    }
}
