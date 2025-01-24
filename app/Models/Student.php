<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname', 'phone', 'email', 'address', 'date_of_birth', 'class_id'
    ];

    public function classModel()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
}
