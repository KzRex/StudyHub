<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'teachers';

    protected $fillable = [
        'fullname', 'phone', 'email', 'address', 'date_of_birth', 'subject_id'
    ];

    public function classes()
    {
        return $this->hasMany(Classes::class, 'teacher_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
