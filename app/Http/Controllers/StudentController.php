<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Admin\Event;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        return view('registers.show');        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(StudentRequest $request)
    {   
        $events = Event::all();
        $id_event = $request->id_evento;
        foreach($events as $evento){
            if($evento->id == $id_event)
            {     
                if($request->costo_e > 0)
                {
                    $email = $request->email;
                    $ci = $request->carnet_identidad;

                    if (DB::table('students')->where('email', $email)->where('id_evento', $id_event)->exists()) 
                    {
                        return redirect()->route('events.show', $evento)->with('info', 'El email ya esta registrado en este evento.');
                    }
                    if (DB::table('students')->where('carnet_identidad', $ci)->where('id_evento', $id_event)->exists()) 
                    {
                        return redirect()->route('events.show', $evento)->with('info', 'El número de Carnet de identidad ya esta registrado en este evento.');
                    }
                    $student = $request->all(); 

                    if($request->hasFile('img_deposito'))
                    {
                        $stu['img_deposito'] =  $request->file('img_deposito')->getClientOriginalName();
                        $student['img_deposito'] = $request->file('img_deposito')->storeAs('depositos', $stu['img_deposito']);
                    }
                    
                    Student::create($student);
        
                    return redirect()->route('events.show', $evento)->with('info', 'Su formulario ha sido enviado con exito, 
                        debe Ingresar al evento para verificar su inscripción con su USUARIO: email y CONTRASEÑA: Carnet de identidad.');
                }
                else
                {
                    
                    $student = $request->all();

                    if($request->has('progreso'))
                    {
                        $student['progreso'] =  'aprobado';
                    }
                    
                    Student::create($student);

                    return redirect()->route('events.show', $evento)->with('info', 'Su formulario ha sido enviado con exito, 
                        debe Ingresar al evento con su USUARIO: email y CONTRASEÑA: Carnet de identidad para mas información.');
                }
            }
        }
    }

    public function edit(Student $student)
    {
        $id_event = $student->id_evento;

        $event = DB::table('events')->find($id_event);

        return view('registers.edit', compact('student', 'event'));
    }

    public function update(StudentRequest $request, Student $student)
    {
        
        if($request->file('img_deposito')){
            
            $stu['img_deposito'] =  $request->file('img_deposito')->getClientOriginalName();
            $img = $request->file('img_deposito')->storeAs('depositos', $stu['img_deposito']);

            if($student->img_deposito)
            {
                Storage::delete($student->img_deposito);

                $student->update([
                    'img_deposito' => $img
                ]);
            }
            else
            {
                $student->create([
                    'img_deposito' => $img
                ]);
            }

        }
        if($student->observation())
        {
            $student->observation()->delete();
        }
        $student->progreso = 'enviado';

        $student->update($request->except(['img_deposito']));   

        return redirect()->route('students.edit', $student)->with('info', 'Sus datos fueron actualizados y serán verificados!!');
    }

    public function certificado(Student $student)
    {   
        $id = $student->id_evento; 

        $certificate = DB::table('certificates')->where('id_evento', $id)->first();
        $id_image = $certificate->image_id;
     
        $image = DB::table('images')->find($id_image);
        $event = DB::table('events')->find($id);

        $nombre = " ".$student->sufix." ".$student->nombre." ".$student->apellido_paterno." ".$student->apellido_materno;
        $nombrec = $student->nombre.$student->apellido_paterno.$student->apellido_materno;
        
        return view('certificate.index', compact('student', 'image', 'certificate', 'event', 'nombre','nombrec')); 
    }

    public function pdf(Student $student)
    {
        $id = $student->id_evento; 

        $certificate = DB::table('certificates')->where('id_evento', $id)->first();
        $id_image = $certificate->image_id;
     
        $image = DB::table('images')->find($id_image);
        $event = DB::table('events')->find($id);

        $nevent = $event->evento;
        
        $nombre = $student->sufix." ".$student->nombre." ".$student->apellido_paterno." ".$student->apellido_materno;
        $nombrec = $student->sufix.$student->nombre.$student->apellido_paterno.$student->apellido_materno;
 
        // $pdf = Pdf::loadView('certificate.pdf', ['nombre' =>$nombre, 'certificate' => $certificate, 'image' => $image])->setPaper('carta', 'landscape');
        // return $pdf->stream();

        $pdf = Pdf::loadView('certificate.pdf', ['nombre' =>$nombre, 'student' =>$student, 'certificate' => $certificate, 'image' => $image])->setPaper('carta', 'landscape');
        return $pdf->download('Certificado_'.$nombrec.'_'.$nevent.'.pdf');
        
        return view('certificate.pdf', compact('student', 'image', 'certificate', 'event', 'nombre')); 
    }

}
