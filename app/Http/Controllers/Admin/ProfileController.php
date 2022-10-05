<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $profiles = profile::all();
        $roles = Role::all();

        return view('admin.profiles.index', compact('users','profiles', 'roles'));
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
                'num_celular' => 'required',
                'biography' => 'required'
            ],
            [
                'id_user.required' => 'El usuario es requerido. ',
                'suffix.required' => 'La profesión es requerido. ',
                'num_celular.required' => 'El número de celular es requerido. ',
                'biography.required' => 'La bigrafia es requerido.',
            ]
        ); 
        //return $request;
        
        $profile = Profile::create($request->all());

        return redirect()->route('admin.profiles.index', $profile)->with('info', 'El perfil del usuario fue actualizado');
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
    public function edit($id)
    {   
       $user = User::where('id', $id)->get();;

       return view('admin.profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
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
