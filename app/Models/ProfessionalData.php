<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalData extends Model
{
    use HasFactory;

    public function alumni() {
        return $this->belongsTo(Alumni::class);
    }
}
