<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use App\Models\Document;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Leer Documentos')->only('index');
        $this->middleware('can:Crear Documentos')->only('create', 'store');
        $this->middleware('can:Editar Documentos')->only('edit', 'update');
        $this->middleware('can:Eliminar Documentos')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $documents = Document::all();

        return view('admin.documents.index', compact('documents', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();

        return view('admin.documents.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate
        ([ 
            'id_evento' => 'required',
            'titulo' => 'required',
            'documento' => 'required'
        ],
        [
            'id_evento.required' => 'El evento es requerido.',
            'titulo.required' => 'El titulo del documento es requerido.',
            'documento.required' => 'El documento es requerido.'
        ]
    );

        $document = $request->all();

        if($request->hasFile('documento'))
        {
            //$document['documento'] = Storage::put('documents', $request->file('documento'));
            $docu['documento'] =  $request->file('documento')->getClientOriginalName();
            $document['documento'] =  $request->file('documento')->storeAs('documents', $docu['documento']);
            
        }
        $documento = Document::create($document);

        return redirect()->route('admin.documents.edit', $documento)->with('info', 'El documento se agrego con exito');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit(Document $document)
    {
        $events = Event::pluck('evento', 'id')->toArray();

        return view('admin.documents.edit', compact('document', 'events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        
        $request->validate
        ([
            'titulo' => 'required',
            'id_evento' => 'required',
            'documento' => 'required'
        ],
        [
            'id_evento.required' => 'El evento es requerido.',
            'titulo.required' => 'El titulo del documento es requerido.',
            'documento.required' => 'El documento es requerido.'
        ]
    );

        if($request->file('documento'))
        {
            $document['documento'] =  $request->file('documento')->getClientOriginalName();
            $doc = $request->file('documento')->storeAs('documents', $document['documento']);

            if($document->documento)
            {
                Storage::delete($document->documento);

                $document->update([
                    'documento' => $doc
                ]);
            }
            else
            {
                $document->create([
                    'documento' => $doc
                ]);
            }
        }
        $document->update($request->except(['documento']));

        return redirect()->route('admin.documents.edit', $document)->with('info', 'El documento se actualizo con exito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->back()->with('info', 'El documento se elimino correctamente');
    }
}
