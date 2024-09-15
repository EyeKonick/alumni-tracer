<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyIncome extends Model
{
    use HasFactory;

    protected $fillable = ['range'];

    public function professionalData()
    {
        return $this->hasMany(ProfessionalData::class);
    }
}
