<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direction', function (Blueprint $table) {
            $table->id();
            $table->string("Libelle");
            $table->string("Nom");
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
       
        Schema::dropIfExists('direction');
    }
}
