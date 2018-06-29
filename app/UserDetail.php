<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
      'photo','age','weight','height','country','gender','phone','goals',
      'longitude','latitude','photo','battery', 'fcm', 'sos_status',
      'location_time', 'activation_code', 'activation_date', 'livetrack',
      'livetrack_time', 'is_active', 'code_updated_at', 'beepinit'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
