<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'syllabus',
        'duration'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function batch()
    {
        return $this->hasMany(Batch::class);
    }
    public function student() {
        return $this->hasMany(Student::class);
    }
}
