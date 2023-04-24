<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class SiteEventoController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Evento::get(['id', 'title', 'start', 'end']);
            
            return response()->json($data, 200);
        }
  
        return view('site.agenda.index');
    }
}
