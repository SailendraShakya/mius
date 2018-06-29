<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'email', 'number', 'phn_code', 'relation', 'beep_activator', 'opt', 'created_at', 'updated_at',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
