<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Mail\ApprovedStudent;
use App\Mail\RejectStudent;
use App\Models\Admin\Event;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EnviadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Leer Participantes Pendientes')->only('index');
        $this->middleware('can:Editar Participantes Pendientes')->only('edit', 'update');
        $this->middleware('can:Eliminar Participantes Pendientes')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $events = Event::all();

        return view('admin.students.enviado', compact('students', 'events'));
    }

    public function edit(Student $student)
    {
        $id_event = $student->id_evento;
        $event = DB::table('events')->find($id_event);

        return view('admin.students.edit', compact('student', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(StudentRequest $request, Student $student)
    {
        $student->update($request->all());

        if($request->file('img_deposito'))
        {
            $img = Storage::put('depositos', $request->file('img_deposito'));

            if($student->img_deposito)
            {
                Storage::delete($student->img_deposito);

                $student->update([
                    'imagen' => $img
                ]);
            }
            else
            {
                $student->create([
                    'imagen' => $img
                ]);
            }
        }
        
        return redirect()->route('admin.students.enviado.edit', $student)->with('info','Se modificaron los datos del participante');
    }

    public function destroy(Student $student)
    {
       $student->delete();

        return redirect()->back()->with('info','El participante se ha eliminado');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function aprobar(Student $student)
    {
        $id_evento = $student->id_evento; 
        $event = DB::table('events')->find($id_evento);
        
        $student->progreso = 'aprobado';
        $student->save();

        // Para que se envie un correo de electronico 

        $email = new ApprovedStudent($student);
        //Mail::to($student->email)->send($email);

        return back();
    }

    public function observar(Student $student)
    { 
        return view('admin.students.observation', compact('student'));
    }

    public function rechazado(Request $request, Student $student)
    {

        $student->observation()->create($request->all());

        $student->progreso = 'rechazado';
        $student->save();
        
        // Para que se envie un correo electronico 

        $email = new RejectStudent($student);
        //Mail::to($student->email)->send($email);

        $students = Student::all();
        $id_evento = $student->id_evento;
        $event = Event::find($id_evento);

        $id = $event->id;
        $students = Student::where([['id_evento','=',$id], ['progreso', '=', 'rechazado']])->get();
        $count = $students->count();

        return view('admin.events.students.rechazados', compact('students', 'event', 'count'));
    }
}
