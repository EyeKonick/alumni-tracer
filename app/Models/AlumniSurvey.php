<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumniSurvey extends Model
{
    protected $table = 'alumni_survey';
    protected $fillable = [
        'alumni_id',
        'degree_skills_in_line',
        'suggestions',
        'document_path',
        'challenges_faced',
    ];

    protected $casts = [
        'degree_skills_in_line' => 'boolean',
        'challenges_faced' => 'array', // Cast the JSON column to an array
    ];
}
