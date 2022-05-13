<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            //$table->string('fonction');
            $table->string('email')->unique();
            $table->foreignId("departement_Id")->constrained();
            $table->string('telephone1');
            $table->string('telephone2')->nullable();
            $table->string('password');
            //$table->string('photo');
           
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
        schema::table('users', function(Blueprint $table){
            $table->dropForeignId("departement_Id");
           });    
        Schema::dropIfExists('users');
    }
}
