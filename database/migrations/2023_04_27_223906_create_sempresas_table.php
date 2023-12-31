<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sempresas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('municipio_id')
                ->constrained('municipios');
            $table->foreignId('eactividade_id')
                ->constrained('eactividades');
            $table->foreignId('regime_id')
                ->constrained('regimes');
            $table->foreignId('person_id')
                ->constrained('persons');
            $table->string('emp_direccion',100)->nullable();
            $table->string('razon_social',100);
            $table->string('NIT',25);
            $table->string('emp_email',60)->nullable();
            $table->string('emp_telefono',60)->nullable();
            $table->string('nro_roe',60)->nullable();
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
        Schema::dropIfExists('sempresas');
    }
};
