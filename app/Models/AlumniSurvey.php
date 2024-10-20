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
        'document_path_2',
        'document_path_3',
        'challenges_faced',
        'additional_info_text',
    ];

    protected $casts = [
        'degree_skills_in_line' => 'boolean',
        'challenges_faced' => 'array',
    ];
}
