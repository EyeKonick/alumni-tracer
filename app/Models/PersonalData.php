<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    protected $table = 'personal_data';

    protected $guarded = [];
    
    public function alumni() {
        return $this->belongsTo(Alumni::class);
    }
}
