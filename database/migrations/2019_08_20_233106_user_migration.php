<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('tb_users',function(Blueprint $table){

        $table->increments('id_user');
        $table->string('name_user');
        $table->string('email_user')->unique();
        $table->string('password_user');
        $table->string('avatar')->default('default.png');
        $table->enum('type_user' ,['Miembro','Admin','Moderador'])->default('Miembro');
        $table->enum('ban',['true','false'])->default('false');
        $table->rememberToken();
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
        Schema::dropIfExists('tb_users');
    }
}
