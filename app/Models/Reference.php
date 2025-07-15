<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = [
        'applicant_id',
        'referral_name',
        'referral_email',
        'referral_contact'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
