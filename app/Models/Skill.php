<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function professionalData()
    {
        return $this->belongsToMany(ProfessionalData::class, 'professional_data_skill', 'skill_id', 'professional_data_id');
    }
}
