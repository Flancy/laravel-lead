<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'name', 'category', 'lead_name', 'price', 'description', 'date_actual'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function leadBid()
    {
        return $this->hasMany('App\LeadBid');
    }

    public function payLead()
    {
        return $this->hasMany('App\PayLead');
    }
}
