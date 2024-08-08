<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalData extends Model
{
    protected $table = 'professional_data';
    
    protected $casts = [
        'skills' => 'array',
    ];

    protected $guarded = [];

    public function alumni() {
        return $this->belongsTo(Alumni::class);
    }
}
