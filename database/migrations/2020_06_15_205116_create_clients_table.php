<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('clients', function (Blueprint $table) {
      $table->id();

      $table->string('name')->nullable();
      $table->string('addrees')->nullable();
      $table->string('city')->nullable();
      $table->string('numIdenficication')->nullable();
      $table->string('phone')->nullable();
      $table->string('email')->unique()->nullable();
      $table->string('ocupacion')->nullable();
      $table->string('empresa')->nullable();
      $table->string('domicilio')->nullable();
      $table->string('cargo')->nullable();
      $table->string('celular')->nullable();
      $table->string('ingresoMes')->nullable();
      $table->string('nombreRef')->nullable();
      $table->string('identificacionRef')->nullable();
      $table->string('ocupacionRef')->nullable();
      $table->string('fechaNacRef')->nullable();
      $table->string('nombreRef2')->nullable();
      $table->string('identificacionRef2')->nullable();
      $table->string('ocupacionRef2')->nullable();
      $table->string('fechaNacRef2')->nullable();
      $table->string('email')->unique()->nullable();
      $table->longText('contract')->nullable();
      $table->string('scholl')->nullable();
      $table->string('pay')->nullable();
      $table->string('terminos')->nullable();
      $table->string('terminosCompra')->nullable();
      $table->string('terminosCusro')->nullable();
      $table->string('titleContract')->nullable();
      $table->bigInteger('asesorId')->unsigned();

      $table->foreign('asesorId')->references('id')->on('users');

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
    Schema::dropIfExists('clients');
  }
}
