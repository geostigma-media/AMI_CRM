<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterClientsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('clients', function (Blueprint $table) {

      $table->renameColumn('empresa', 'empresa_nombre');
      $table->renameColumn('domicilio', 'empresa_direccion');

      $table->renameColumn('nombreRef', 'referencia_nombre');
      $table->renameColumn('identificacionRef', 'referencia_direccion');
      $table->renameColumn('ocupacionRef', 'referencia_telefono');
      $table->renameColumn('fechaNacRef', 'referencia_ocupacion');
      $table->renameColumn('nombreRef2', 'referencia_tipo');

      $table->string('beneficiario_nombre')->nullable();
      $table->string('beneficiario_identificacion')->nullable();
      $table->string('beneficiario_ocupacion')->nullable();
      $table->string('beneficiario_fecha_nacimiento')->nullable();


      $table->dropColumn('identificacionRef2');
      $table->dropColumn('ocupacionRef2');
      $table->dropColumn('fechaNacRef2');

      $table->dropColumn('ocupacion');
      $table->dropColumn('cargo');
      $table->dropColumn('celular');
      $table->dropColumn('ingresoMes');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //
  }
}
