<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender_id',
        'age',
        'civil_status_id',
        'year_graduated',
        'course_graduated_id',
        'home_address',
        'cellphone_number',
        'email',
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function civilStatus()
    {
        return $this->belongsTo(CivilStatus::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_graduated_id');
    }
    public function professionalData()
    {
        return $this->hasOne(ProfessionalData::class, 'alumni_id');
    }
    public function courseGraduated()
    {
        return $this->belongsTo(Course::class, 'course_graduated_id');
    }


}
