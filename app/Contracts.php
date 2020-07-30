<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
  protected $guarded = [];

  public function emails()
  {
    return $this->belongsTo(TemplateEmail::class, 'emailId');
  }
}
