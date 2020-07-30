<?php

use App\TemplateEmail;
use Illuminate\Database\Seeder;

class TemplateEmailsTableSeed extends Seeder
{
  public function run()
  {
    TemplateEmail::create([
      'title' => 'Bienvendo',
      'firstText' => 'Hola, como estas',
      'type' => 1
    ]);

    TemplateEmail::create([
      'title' => 'Bienvendo',
      'firstText' => 'Hola, como estas',
      'type' => 2
    ]);
  }
}
