<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{
  protected $table = 'blogs';

  protected $fillable = ['name', 'title','subject_id','Text'];
}
