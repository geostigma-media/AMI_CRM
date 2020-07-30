<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
  public function up()
  {
    Schema::create('contracts', function (Blueprint $table) {
      $table->id();

      $table->string('title')->nullable();
      $table->longText('firstText')->nullable();
      $table->longText('secondText')->nullable();
      $table->integer('type')->nullable();
      $table->string('link', 200)->nullable();
      $table->bigInteger('emailId')->unsigned()->nullable();

      $table->foreign('emailId')->references('id')->on('template_emails');
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
    Schema::dropIfExists('contracts');
  }
}
