<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracingClientsTable extends Migration
{
  public function up()
  {
    Schema::create('tracing_clients', function (Blueprint $table) {
      $table->id();

      $table->string('observation')->nullable();
      $table->bigInteger('taskId')->unsigned();
      $table->bigInteger('clientId')->unsigned();

      $table->foreign('taskId')->references('id')->on('tasks');
      $table->foreign('clientId')->references('id')->on('clients');

      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('tracing_clients');
  }
}
