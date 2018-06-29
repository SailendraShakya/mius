<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
      'name', 'email', 'number', 'is_lawyer', 'is_insurance_agent', 'is_financial_advisor', 'created_at', 'updated_at',
  ];


  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
