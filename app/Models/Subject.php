<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'subjects';

    protected $fillable = [
        'name', 'difficulty'
    ];

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'subject_id');
    }

    public function classes()
    {
        return $this->hasMany(Classes::class, 'subject_id');
    }
}

