<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadBid extends Model
{
    protected $fillable = [
        'company_id', 'lead_id', 'price', 'description', 'unique_offer', 'date_actual'
    ];
}
