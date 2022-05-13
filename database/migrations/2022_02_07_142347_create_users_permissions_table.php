<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_permissions', function (Blueprint $table) {
            $table->foreignId("users_id");
            $table->foreignId("permissions_id"); //->constrained("permissions")
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
        Schema::create('users_permissions', function (Blueprint $table) {
            $table->dropForeignId("users_id");
            $table->dropForeignId("permissions_id");
        });
        Schema::dropIfExists('users_permissions');
    }
}
