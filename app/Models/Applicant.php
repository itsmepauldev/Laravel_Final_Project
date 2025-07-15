<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'name',
        'email',
        'birthdate',
        'phone_number',
        'address',
        'gender',
    ];

    public function educations()
    {
        return $this->hasMany(Education::class);
    }
    public function employments()
    {
        return $this->hasMany(Employment::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function references()
    {
        return $this->hasMany(Reference::class);
    }

}

