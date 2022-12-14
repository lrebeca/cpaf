<?php

namespace App\Http\Controllers;

use App\Models\Admin\Event;
use App\Models\Certificate;
use App\Models\Detail;
use App\Models\Document;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(Cache::has('events'))
        // {
        //     $events = Cache::get('events');
        // }
        // else
        // {
            $events = Event::where('estado', 2)->latest('id')->get();
            Cache::put('events', $events);
        //}
        
        $date = $date = Carbon::now();
        return view('welcome', compact('events', 'date'));
    }

    public function show(Event $event)
    {
        $this->authorize('published', $event); 

        $date = $date = Carbon::now();

        return view('registers.show', compact('event', 'date'));
    }

    public function ingresar(Request $request, Event $event)
    {
        $id_event = $request->id_evento;
        $event = DB::table('events')->find($id_event);
        $details = Detail::all();
        $documents = Document::all();
        
        $request->validate([
            'email2' => 'required',
            'carnet_identidad2' => 'required'
        ],
        [
            'email2.required'=>'Ingrese Email',
            'carnet_identidad2.required'=>'Ingrese Contraseña'
        ]);

        $email=$request->email2;
        
        $student1=Student::where('email','=',$email)->get();
        $id = $student1[0]->id;
        $student = DB::table('students')->find($id);

        $observaciones = $student1[0]->observation;
        $date = $date = Carbon::now();
        $certificates = Certificate::all();
        $students = Student::all();

        if($student1->count() !=0){
            $hashp=$student1[0]->carnet_identidad;
            $password=$request->get('carnet_identidad2');
            if($password==$hashp){

                if($id_event == $student1[0]->id_evento)
                { 
                    return view('registers.evento', compact('event', 'documents', 'details', 'students', 'student', 'email','observaciones', 'date', 'certificates'));
                }
                else
                {
                    return redirect()->withErrors(['id_evento'=>'El participante no se registro en este evento !!!'])->withInput([request('id_evento')]);
                }
            }
            else
            {
                return redirect()->back()->withErrors(['carnet_identidad2'=>'Contraseña no es Valida'])->withInput([request('carnet_identidad2')]);
            }
        }
        else
        {
            return back()->withErrors(['email2'=>'Email no Valido'])->withInput([request('email2')]);
        }
    }
}
