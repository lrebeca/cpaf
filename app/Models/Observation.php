<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'student_id'];

    // Relacion uno a uno inversa con student
    public function student(){
        return $this->belongsTo(student::class);
    }
}
