<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['applicant_id', 'payment_type', 'amount'];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}

