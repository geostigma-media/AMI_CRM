<?php

use App\Task;
use Illuminate\Database\Seeder;

class TaskSeed extends Seeder
{
  public function run()
  {
    Task::create([
      'name'=> 'Llamada de bienvenida',
      'type' => 1
    ]);
    Task::create([
      'name'=> 'Envio de mudulos',
      'type' => 1
    ]);
    Task::create([
      'name'=> 'Orientacion',
      'type' => 1
    ]);
    Task::create([
      'name'=> 'Inicio de plataforma',
      'type' => 1
    ]);
    Task::create([
      'name'=> 'Llamada',
      'type' => 2
    ]);
    Task::create([
      'name'=> '2',
      'type' => 2
    ]);
  }
}
