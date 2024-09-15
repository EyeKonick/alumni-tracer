<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalData extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_address',
        'address',
        'employer',
        'employer_address',
        'employment_status_id',
        'present_position',
        'inclusive_from',
        'inclusive_to',
        'monthly_income_id',
        'skills_used'
    ];

    public function employmentStatus()
    {
        return $this->belongsTo(EmploymentStatus::class, 'employment_status_id');
    }

    public function monthlyIncome()
    {
        return $this->belongsTo(MonthlyIncome::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'professional_data_skill', 'professional_data_id', 'skill_id');
    }
    public function personalData()
    {
        return $this->belongsTo(PersonalData::class, 'alumni_id');
    }

}
