<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class PublicGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('status', 'published')
            ->latest()
            ->paginate(12);
            
        return view('public.galleries.index', compact('galleries'));
    }
    
    public function show($slug)
    {
        $gallery = Gallery::with('images')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
            
        return view('public.galleries.show', compact('gallery'));
    }
}
