<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use App\Models\Attendances;
use App\Models\Ready;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReadyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'holAA';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $event = Event::find($id);
        $students = Student::where([['id_evento','=',$id], ['progreso', '=', 'aprobado']])->get();

        return view('admin.listas.create', compact('event', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required',
            ],
            [
                'nombre.required' => 'El nombre es requerido.',
            ]
        );

        $id = $request->event_id;

        $ready = Ready::create($request->all());

        $students = Student::where([['id_evento','=',$id], ['progreso', '=', 'aprobado']])->get();

        foreach ($students as $student)
        {
           $at = Attendances::create([
            'estado' => 'presente',
            'student_id' => $student->id,
            'ready_id' => $ready->id,
            ]);
        }
        
        return redirect()->route('admin.readys.edit', $ready)->with('info', 'La lista fue creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $readys = Ready::where([['event_id','=',$id]])->get();
        $attendances = Attendances::all();
        $students = Student::where([['id_evento','=',$id], ['progreso', '=', 'aprobado']])->get();

        foreach($readys as $ready)
        {
            if($ready->event_id == $id)
            {
                $lista = $ready;
                return view('admin.listas.index', compact('event', 'students', 'readys', 'attendances'));
            }
            
        }
        return view('admin.listas.index', compact('event', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ready $ready)
    {
        $id = $ready->event_id;
        $event = Event::find($id);
        $id_r = $ready->id;
        $attendances = Attendances::where([['ready_id','=',$id_r]])->get();
        
        $students = Student::where([['id_evento','=',$id], ['progreso', '=', 'aprobado']])->get();

        return view('admin.listas.edit', compact('event', 'students', 'ready','attendances'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ready $ready)
    {
        $request->validate(
            [
                'nombre' => 'required',
            ],
            [
                'nombre.required' => 'El nombre es requerido.',
            ]
        );

        $ready->update($request->all());

        $id = $request->event_id;

        return redirect()->route('admin.readys.show', $id)->with('info', 'La lista fue actualizado con exito!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ready $ready)
    {
        $ready->delete();
        return redirect()->back()->with('info', 'la lista fue eliminado');
    }

    // pdf

    public function pdf($id)
    {
        $event = Event::find($id);
        $readys = Ready::where([['event_id','=',$id]])->get();
        $students = Student::where([['id_evento','=',$id], ['progreso', '=', 'aprobado']])->get();
        $n = 0;
        $attendances = Attendances::all();

        //return view('admin.listas.pdf', compact('event', 'students', 'readys', 'attendances', 'n'));
        
        $pdf = Pdf::loadView('admin.listas.pdf', ['event'=>$event, 'students'=>$students, 'readys'=>$readys, 'attendances'=>$attendances, 'n'=>$n]);
        return $pdf->download('Lista_asistencia_'.$event->evento.'.pdf');
    }
}
