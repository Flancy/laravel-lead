<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id', 'avatar', 'name',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
