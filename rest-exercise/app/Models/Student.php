<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'full_name',
        'email',
        'phone',
        'address',
        'entry_points',
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
