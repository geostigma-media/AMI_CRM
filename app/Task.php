<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $guarded = [];

  public function tracing_clients()
  {
    return $this->hasMany(TracingClient::class);
  }
}
