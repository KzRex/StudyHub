<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'classes';

    protected $fillable = [
        'teacher_id', 'subject_id', 'class_name', 'start_date', 'end_date'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}

