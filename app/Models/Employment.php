<?php

// app/Models/Employment.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    protected $fillable = [
        'applicant_id',
        'company',
        'position',
        'year_from',
        'year_to'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}

