<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'image',
        'phone',
        'address',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(Teacher::all());
    }
}
