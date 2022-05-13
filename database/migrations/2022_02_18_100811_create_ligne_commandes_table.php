<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LigneCommandes', function (Blueprint $table) {
            $table->id();
            $table->string('QuantiteCommander');
            $table->foreignId("materiels_Id")->constrained();
            $table->foreignId("Commandes_Id")->constrained();
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
        schema::table('LigneCommandes', function(Blueprint $table){
            $table->dropForeignId("materiels_Id");
            $table->dropForeignId("commandes_Id");
            
           });    
        Schema::dropIfExists('LigneCommandes');
    }
}
