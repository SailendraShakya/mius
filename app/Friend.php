<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable = [
        'name', 'email', 'number', 'description', 'created_at', 'updated_at',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
