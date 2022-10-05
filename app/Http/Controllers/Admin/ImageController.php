<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Leer Imagenes')->only('index');
        $this->middleware('can:Crear Imagenes')->only('create', 'store');
        $this->middleware('can:Editar Imagenes')->only('edit', 'update');
        $this->middleware('can:Eliminar Imagenes')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        
        return view('admin.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.images.create');
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
                'imagen' => 'required',
            ],
            [
                'imagen.required' => 'La imagen es requerido.'
            ]
        );
            
        $image = $request->all();
        
        if($request->hasFile('imagen')){

            $imag['imagen'] =  $request->file('imagen')->getClientOriginalName();
            $image['imagen'] = $request->file('imagen')->storeAs('certificates', $imag['imagen']); 

        }

        $imagen = Image::create($image);

        return redirect()->route('admin.images.index')->with('info', 'La imagen fue creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Image $image)
    {
        return view('admin.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $request->validate
        ([
            'imagen' => 'required',
        ],
        [
            'imagen.required' => 'La imagen es requerido.'
        ]
    ); 
                
        if($request->file('imagen')){
            
            $image['imagen'] =  $request->file('imagen')->getClientOriginalName();
            $img = $request->file('imagen')->storeAs('certificates', $image['imagen']); 

            if($image->imagen)
            {
                Storage::delete($image->imagen);

                $image->update([
                    'imagen' => $img
                ]);
            }
            else
            {
                $image->create([
                    'imagen' => $img
                ]);
            }

        }

        return redirect()->route('admin.images.index')->with('info', 'La imagen fue actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return redirect()->route('admin.images.index')->with('info','La imagen se elimino');
    }
}
