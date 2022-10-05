<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Admin\Event;
use App\Models\Certificate;
use App\Models\Detail;
use App\Models\Document;
use App\Models\Image;
use App\Models\Organizer;
use App\Models\Province;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Leer Eventos')->only('index');
        $this->middleware('can:Crear Eventos')->only('create', 'store');
        $this->middleware('can:Editar Eventos')->only('edit', 'update');
        $this->middleware('can:Eliminar Eventos')->only('destroy');

        $this->middleware('can:Leer Detalles')->only('detalle');
        $this->middleware('can:Crear Detalles')->only('createdetail');

        $this->middleware('can:Leer Documentos')->only('documentos');
        $this->middleware('can:Crear Documentos')->only('createdocument');

        $this->middleware('can:Leer Participantes Aprobados')->only('aprobados');
        $this->middleware('can:Leer Participantes Pendientes')->only('pendientes');
        $this->middleware('can:Leer Participantes Rechazados')->only('rechazados');

        $this->middleware('can:Leer Certificados')->only('certificado');
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        $organizers = Organizer::all();
        $events = Event::all();
        $users = User::all();
        //$users = User::pluck('name', 'id');
        $certificates = Certificate::all();
        
        // if(Cache::has('events'))
        // {
        //     $events = Cache::get('events');
        // }
        // else
        // {
        //     $events = Event::where('estado', 2)->latest('id')->get();
        //     Cache::put('events', $events);
        // }

        return view('admin.events.index', compact('events', 'organizers', 'provinces', 'users', 'certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizers = Organizer::pluck('unidad', 'id');
        $provinces = Province::pluck('provincia', 'id');
        $users = User::all();

        return view('admin.events.create', compact('users', 'organizers', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $event = $request->all();
        if($request->hasFile('imagen')){

            $even['imagen'] =  $request->file('imagen')->getClientOriginalName();
            $event['imagen'] = $request->file('imagen')->storeAs('events', $even['imagen']);

        }

        $evento = Event::create($event);
        $evento->users()->attach($request->input('users'));

        //Cache::flush();

        return redirect()->route('admin.events.edit', $evento)->with('info','El evento se creo con exito!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit(Event $event)
    {

        $this->authorize('author', $event);

        $organizers = Organizer::pluck('unidad', 'id');
        $provinces = Province::pluck('provincia', 'id');
        $users = User::all();
        $user_ids = $event->users()->pluck('users.id');

        return view('admin.events.edit', compact('event', 'users', 'organizers','provinces', 'user_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
      
        $this->authorize('author', $event);

        if($request->file('imagen'))
        {
            $event['imagen'] =  $request->file('imagen')->getClientOriginalName();
            $img = $request->file('imagen')->storeAs('events', $event['imagen']);

            if($event->imagen)
            {
                Storage::delete($event->imagen);

                $event->update([
                    'imagen' => $img
                ]);
            }
            else
            {
                $event->create([
                    'imagen' => $img
                ]);
            }
        }
        $event->update($request->only(['evento','detalle','costo_student','costo_prof','fecha_inicio','fecha_fin','link_whatsapp','link_telegram','estado','user_id','id_organizador','province_id','created_at','updated_at']));
        $event->users()->sync($request->input('users'));

        //Cache::flush();

        return redirect()->route('admin.events.edit', $event)->with('info','El evento se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        
        $this->authorize('author', $event);

        $event->delete();

        //Cache::flush();
        
        return redirect()->route('admin.events.index')->with('info','El evento se elimino con exito');
    }

    // detalles del evento 

    public function detalles(Event $event)
    {
        $id = $event->id;
        $details = Detail::where('id_evento','=',$id)->get();
        //return $details;
        return view('admin.events.details', compact('details', 'event'));
    }

    public function createdetail(Event $event)
    {
        return view('admin.events.createdetail', compact('event'));
    }

    public function documentos(Event $event)
    {
        $id = $event->id;
        $documents = Document::where('id_evento','=',$id)->get();
        //return $details;
        return view('admin.events.documents', compact('documents', 'event'));
    }

    public function createdocument(Event $event)
    {
        return view('admin.events.createdocument', compact('event'));
    }

    public function aprobados(Event $event)
    {
        $id = $event->id;
        $students = Student::where([['id_evento','=',$id], ['progreso', '=', 'aprobado']])->get();
        $count = $students->count();
        
        return view('admin.events.students.aprobados', compact('students', 'event', 'count'));
    }

    public function pendientes(Event $event)
    {
        $id = $event->id;
        $students = Student::where([['id_evento','=',$id], ['progreso', '=', 'enviado']])->get();
        //$students = DB::table('students')->where([['id_evento','=',$id], ['progreso', '=', 'enviado']])->get();
        $count = $students->count();
        
        return view('admin.events.students.enviados', compact('students', 'event', 'count'));
    }

    public function rechazados(Event $event)
    {
        $id = $event->id;
        $students = Student::where([['id_evento','=',$id], ['progreso', '=', 'rechazado']])->get();
        $count = $students->count();
        
        return view('admin.events.students.rechazados', compact('students', 'event', 'count'));
    }

    public function certificado(Event $event)
    {
        $id = $event->id;
        $certificates = Certificate::all();
        $images = Image::all();
 
        return view('admin.events.certificado', compact('certificates', 'event', 'images'));        
    }
}