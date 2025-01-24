<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'difficulty'
    ];

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'subject_id');
    }

    public function classes()
    {
        return $this->hasMany(Classroom::class, 'subject_id');
    }
}

