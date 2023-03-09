<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ready extends Model
{
    use HasFactory;

    protected $table = 'readys';

    protected $fillable = ['info', 'nombre', 'detalle', 'student_id', 'event_id'];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

}
