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
            $table->string('ci',12)->nullable();
            $table->string('username')->unique();
            $table->string('name',200);//nombre completo
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('telefono')->nullable();
            $table->enum('estado',['A','D'])->default('A');//A: Activo D:Desactivado 
            $table->string('direccion')->nullable();
            $table->string('imagen',200)->nullable();
            $table->rememberToken();
            $table->string('ip',16)->nullable();
            $table->timestamp('last_admission')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
