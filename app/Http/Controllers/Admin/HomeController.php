<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        //$events = DB::table('events')->select('*')->orderBy('id','DESC')->first();

        $events = Event::all();
        return view('admin.index', compact('events'));
    }
}
