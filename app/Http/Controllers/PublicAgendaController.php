<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class PublicAgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::where('status', 'published')
            ->orderBy('event_date', 'asc')
            ->paginate(10);
            
        return view('public.agendas.index', compact('agendas'));
    }
    
    public function show($slug)
    {
        $agenda = Agenda::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
            
        $agenda->increment('views');
        
        return view('public.agendas.show', compact('agenda'));
    }
}
