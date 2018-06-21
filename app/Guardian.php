<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'photo', 'relationship', 'status', 'created_at', 'updated_at'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
