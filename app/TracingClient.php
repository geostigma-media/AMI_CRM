<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TracingClient extends Model
{
  protected $guarded = [];

  public function task()
  {
    return $this->belongsTo(Task::class, 'taskId');
  }

  public function client()
  {
    return $this->belongsTo(Clients::class, 'clientId');
  }
}
