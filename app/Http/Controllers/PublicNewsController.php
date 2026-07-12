<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsCategory;

class PublicNewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')->where('status', 'published')->latest()->paginate(9);
        $categories = NewsCategory::all();
        
        return view('public.news.index', compact('news', 'categories'));
    }
    
    public function show($slug)
    {
        $newsItem = News::with('category', 'tags')->where('slug', $slug)->where('status', 'published')->firstOrFail();
        
        // Increase view count
        $newsItem->increment('views');
        
        $relatedNews = News::where('news_category_id', $newsItem->news_category_id)
            ->where('id', '!=', $newsItem->id)
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();
            
        return view('public.news.show', compact('newsItem', 'relatedNews'));
    }
}
