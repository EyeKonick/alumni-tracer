<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function personalData()
    {
        return $this->hasMany(PersonalData::class, 'course_graduated_id');
    }
}
