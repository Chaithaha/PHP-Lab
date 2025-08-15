<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * The course that the professor teaches.
     */
    public function course()
    {
        return $this->hasOne(Course::class);
    }
}
