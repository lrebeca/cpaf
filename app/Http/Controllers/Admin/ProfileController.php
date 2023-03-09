<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        
        $usuario = $user['id'];
        $profiles = Profile::all();

        foreach($profiles as $profile)
        {
            if($profile->id_user == $usuario)
            {
                $perfil = $profile;
                return view('admin.profiles.index', compact('user', 'perfil'));
            }
            
        }

        return view('admin.profiles.create', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profiles.create');
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
                'id_user' => 'required',
                'suffix' => 'required',
                'biography' => 'required' 
            ],
            [
                'id_user.required' => 'El usuario es requerido. ',
                'suffix.required' => 'La profesión es requerido. ',
                'biography.required' => 'La bigrafia es requerido.',
            ]
        ); 
        
        $profile = $request->all();
        if($request->hasFile('foto')){

            $profi['foto'] =  $request->file('foto')->getClientOriginalName();
            $profile['foto'] = $request->file('foto')->storeAs('perfiles', $profi['foto']);

        }
        $perfil = Profile::create($profile);

        return redirect()->route('admin.profiles.index', $perfil)->with('info', 'El perfil del usuario fue actualizado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {  
       return view('admin.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {   
        $request->validate
            ([
                'id_user' => 'required',
                'suffix' => 'required',
                'biography' => 'required' 
            ],
            [
                'id_user.required' => 'El usuario es requerido. ',
                'suffix.required' => 'La profesión es requerido. ',
                'biography.required' => 'La bigrafia es requerido.',
            ]
        ); 
        
        if($request->hasFile('foto')){

            $profile['foto'] =  $request->file('foto')->getClientOriginalName();
            $img = $request->file('foto')->storeAs('perfiles', $profile['foto']);

            if($profile->foto)
            {
                Storage::delete($profile->foto);

                $profile->update([
                    'foto' => $img
                ]);
            }
            else
            {
                $profile->create([
                    'foto' => $img
                ]);
            }

        }
        $perfil = $profile->update($request->only(['suffix','direccion','nun_celular','biography','facebook','youtube','whatsapp','website','id_user','created_at','updated_at']));

        return redirect()->route('admin.profiles.index', $perfil)->with('info', 'Cambios guardados !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
