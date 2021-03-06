<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'status', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function guardians()
    {
        return $this->hasMany('App\Guardian');
    }

    public function families()
    {
        return $this->hasMany('App\Family');
    }

    public function advisors()
    {
        return $this->hasMany('App\Advisor');
    }

    public function friends()
    {
        return $this->hasMany('App\Friend');
    }

    public function detail()
    {
      return $this->hasOne('App\UserDetail');
    }

    public function contact()
    {
      $advisors = $this->advisors;
      print_r($advisors);
      die('testing');
    }
}
