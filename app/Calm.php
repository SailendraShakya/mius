<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calm extends Model
{
      protected $table = 'calms';
      protected $primaryKey = 'id';
      protected $fillable = ['name', 'description', 'steps', 'process_image', 'status'];
}
