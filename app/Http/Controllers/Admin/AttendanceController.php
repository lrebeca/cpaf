<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendances;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function presente(Request $request)
    {
        Attendances::create($request->all());
        return redirect()->back()->with('info','El participante asistio');
    }

    public function falta(Request $request)
    {
        $atn =Attendances::create($request->all());
        return redirect()->back()->with('info','El participante asistio');
    }

    public function editpresente(Request $request, Attendances $attendance)
    {
        $attendance->update($request->all());
        return redirect()->back()->with('info','El participante asistio');
    }

    public function editfalta(Request $request, Attendances $attendance)
    {
        $attendance->update($request->all());
        return redirect()->back()->with('info','El participante asistio');
    }
    public function editlicencia(Request $request, Attendances $attendance)
    {
        $attendance->update($request->all());
        return redirect()->back()->with('info','El participante pidio licencia');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
