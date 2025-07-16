<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    protected $fillable = [
        'title',
        'status',
        'date_needed',
        'date_expiry',
        'location',
    ];
}

