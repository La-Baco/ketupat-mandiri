<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Potential;
use App\Models\PotentialCategory;

class PublicPotentialController extends Controller
{
    public function index()
    {
        $potentials = Potential::with('category')->where('status', 'published')->latest()->paginate(9);
        $categories = PotentialCategory::all();
        
        return view('public.potentials.index', compact('potentials', 'categories'));
    }
    
    public function show($slug)
    {
        $potential = Potential::with('category', 'tags')->where('slug', $slug)->where('status', 'published')->firstOrFail();
        
        $relatedPotentials = Potential::where('potential_category_id', $potential->potential_category_id)
            ->where('id', '!=', $potential->id)
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();
            
        return view('public.potentials.show', compact('potential', 'relatedPotentials'));
    }
}
