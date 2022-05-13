<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departement', function (Blueprint $table) {
            $table->id();
            $table->string("libelle");
            $table->foreignId("direction_Id")->constrained();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();// activer la contraint au clé entrangers 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('direction', function(Blueprint $table){
            $table->dropForeignId("direction_Id");
           });    
        Schema::dropIfExists('departement');
    }
}
