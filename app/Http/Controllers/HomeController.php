<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSection;
use App\Models\News;
use App\Models\Potential;
use App\Models\Gallery;
use App\Models\Agenda;

class HomeController extends Controller
{
    public function index()
    {
        $heroes = HeroSection::where('is_active', true)->orderBy('sort_order')->get();
        $latestNews = News::with('category')->where('status', 'published')->latest()->take(3)->get();
        $potentials = Potential::with('category')->where('status', 'published')->latest()->take(3)->get();
        $galleries = Gallery::where('status', 'published')->latest()->take(4)->get();
        $agendas = Agenda::where('status', 'published')->where('event_date', '>=', now()->toDateString())->orderBy('event_date')->take(4)->get();

        return view('home', compact('heroes', 'latestNews', 'potentials', 'galleries', 'agendas'));
    }
}
