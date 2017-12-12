<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
    	'address', 'pet_name', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
