<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyData extends Model
{
    protected $table = 'survey';

    protected $fillable = [
        'alumni_id',
        'question1',
        'question1_answer',
        'challenges',
        'suggestions',
        'file_path',
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}
