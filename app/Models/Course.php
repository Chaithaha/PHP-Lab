<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'professor_id',
    ];

    /**
     * The students that belong to the course.
     */
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    /**
     * The professor that teaches the course.
     */
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
