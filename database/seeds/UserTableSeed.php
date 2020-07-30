<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{

  public function run()
  {
    User::create([
      'name' => 'admin',
      'email' => 'admin@admin.com',
      'numIdentification' => '12345678',
      'lastname' => 'admin',
      'phone' => 12345678,
      'password' => bcrypt('12345678'),
      'role' => 1
    ]);

    User::create([
      'name' => 'asesor',
      'lastname' => 'asesor',
      'phone' => 12345678,
      'email' => 'asesor@asesor.com',
      'password' => bcrypt('12345678'),
      'numIdentification' => 12345678,
      'role' => 2
    ]);
  }
}
