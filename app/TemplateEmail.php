<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateEmail extends Model
{
  protected $guarded = [];

  public function contrato()
  {
    return $this->hasMany(Contracts::class);
  }
}
