<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayLead extends Model
{
    protected $fillable = [
        'company_id', 'lead_id', 'buy'
    ];
}
