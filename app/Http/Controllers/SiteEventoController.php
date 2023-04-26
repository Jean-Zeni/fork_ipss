<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class SiteEventoController extends Controller
{
    public function index(Request $request)
    {
        $events = [];
        
            $eventos = Evento::get(['id', 'title', 'start', 'end', 'resumo']);
            $eventosLista = Evento::orderBy('start','asc')->paginate(10);
            foreach ($eventos as $evento) {
                $events[] = [
                    'title' => $evento->title,
                    'start' => $evento->start,
                    'end' => $evento->end,
                ];
            }
        
  
        return view('site.agenda.index', compact('events'), ['eventosLista' => $eventosLista]);
    }
}
