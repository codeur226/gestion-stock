<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterielProprieteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiel_propriete', function (Blueprint $table) {
            $table->foreignId("materiels_id")->constrained();
            $table->foreignId("propriete_materiels_id")->constrained();
            $table->string('valeur');
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
        Schema::table('materiel_propriete', function (Blueprint $table) {
            $table->dropForeign("materiels_id");
            $table->dropForeign("propriete_materiels_id");
        });

        Schema::dropIfExists('materiel_propriete');
    }
}
