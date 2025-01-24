<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname', 'phone', 'email', 'address', 'date_of_birth', 'subject_id'
    ];

    public function classes()
    {
        return $this->hasMany(Classroom::class, 'teacher_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
