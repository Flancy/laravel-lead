<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
    protected $fillable = [
        'user_id', 'debit'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
