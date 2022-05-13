<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProprieteMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propriete_materiels', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->boolean("estObligatoire")->default(1);
            $table->foreignId("categorie_materiels_id")->constrained();

            $table->unique(["nom", "categorie_materiels_id"]);
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
        Schema::table('propriete_materiels', function (Blueprint $table) {
            $table->dropForeign("categorie_materiels_id");
        });
        Schema::dropIfExists('propriete_materiels');
    }
}
