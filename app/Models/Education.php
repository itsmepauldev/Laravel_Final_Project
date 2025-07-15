<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = ['applicant_id', 'school_name', 'level', 'year_from', 'year_to'];

    protected $table = 'educations'; // <-- Add this to match your DB table

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
