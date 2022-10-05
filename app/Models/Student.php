<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['sufix',
                            'nombre',
                            'apellido_paterno',
                            'apellido_materno',
                            'email',
                            'carnet_identidad',
                            'carnet_universitario',
                            'carrera',
                            'empleo',
                            'n_celular',
                            'n_celular2',
                            'n_deposito',
                            'img_deposito',
                            'estado',
                            'pago',
                            'progreso',
                            'costo_e',
                            'id_evento',
                            'certificate_id'
                        ];

    public function getRouteKeyName()
    {
        return "nombre";
    }

        
    //relacion uno a muchos inversa con eventos 

    public function event(){
        return $this->belongsTo(Event::class);
    }
    
    // Relacion uno a uno con certificado

    // public function certificate(){
    //     return $this->hasOne(Certificate::class);
    // }

    //relacion uno a muchos inversa con certificados
    public function student(){
        return $this->belongsTo(Student::class);
    }

    // Relacion uno a uno con observes 
    public function observation(){
        return $this->hasOne(Observation::class);
    }
    
}